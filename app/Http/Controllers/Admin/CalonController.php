<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin\Calon;
use Illuminate\Http\Request;
use App\Trait\DatatableTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Repository\RegisterRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCalonRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateCalonRequest;

class CalonController extends Controller
{
    use DatatableTrait;

    private RegisterRepository $registerRepository;
    private Calon $calon;

    public function __construct(RegisterRepository $registerRepository, Calon $calon)
    {
        $this->registerRepository = $registerRepository;
        $this->calon = $calon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatableCalon();
        }

        return view('admin.calon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalonRequest $request)
    {
        $validateDataKampanye = $request->safe()->only(['visi', 'misi']);
        $validateDataCalon = $request->safe()->only(['nama', 'nim', 'angkatan', 'kelas']);

        DB::beginTransaction();

        try {
            // nama foto
            $namaFoto = $this->registerRepository->upload($request->file('foto_calon'), 'calon');

            $validateDataCalon['foto_calon'] = $namaFoto;

            $calon = Calon::create($validateDataCalon);

            $calon->kampanye()->create($validateDataKampanye);

            DB::commit();

            return redirect()->route('calon.index')->with('success', $calon->nama . ' Berhasil ditambahkan');
        } catch (Exception $exception) {
            DB::rollBack();

            Storage::delete('public/calon/' . $namaFoto);

            dd($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        return view('admin.calon.show', [
            'calon' => $calon->load('kampanye')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalonRequest  $request
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalonRequest $request, Calon $calon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        DB::beginTransaction();
        try {
            $calon->delete();

            Storage::delete('public/calon/' . $calon->foto_calon);

            DB::commit();

            Alert::success('Berhasil', 'Berhasil menghapus Calon ' . $calon->nama);

            return back();
        } catch(Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function aktif(Calon $calon)
    {
        if($this->calon->aktifCalon()) {
            Alert::error('Tidak Bisa Aktifkan Calon', 'Total Kandidat Sudah ada 3');

            return back();
        }

        $calon->update(['calonkan' => true]);

        Alert::success('Berhasil', $calon->nama . ' Berhasil dicalonkan');

        return back();
    }

    public function tidakAktif(Calon $calon)
    {
        DB::beginTransaction();

        try {
            $calon->votings()->delete();

            $calon->update(['calonkan' => false]);

            DB::commit();

            Alert::success('Berhasil', $calon->nama . ' Berhasil di non aktifkan');

            return back();
        } catch (Exception $exception) {
            DB::rollBack();

            dd($exception->getMessage());
        }
    }
}
