<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PemilihsExport;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Pemilih;
use App\Trait\DatatableTrait;
use App\Imports\PemilihImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Repository\RegisterRepository;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePemilihRequest;
use App\Http\Requests\UpdatePemilihRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class PemilihController extends Controller
{
    use DatatableTrait;

    private Pemilih $pemilih;
    private RegisterRepository $registerRepository;

    public function __construct(Pemilih $pemilih, RegisterRepository $registerRepository)
    {
        $this->pemilih = $pemilih;
        $this->registerRepository = $registerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatablePemilih();
        }

        return view('admin.pemilih.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemilih.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemilihRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemilihRequest $request)
    {
        $validateDataUser = $request->safe()->only(['username', 'email']);
        $validateDataPemilih = $request->safe()->only(['nama', 'nim', 'angkatan', 'kelas']);

        DB::beginTransaction();

        try {
            // Uplod Foto
            $namaFoto = $this->registerRepository->upload($request->file('foto_pemilih'));
            // hash password
            $password = Hash::make($request->password);

            $validateDataUser['password'] = $password;
            $validateDataPemilih['foto_pemilih'] = $namaFoto;

            $user = User::create($validateDataUser);

            $user->pemilih()->create($validateDataPemilih);

            DB::commit();

            return redirect()->route('pemilih.index')->with('success', 'Berhasil menambah pemilih');
        } catch (Exception $exception) {
            DB::rollBack();

            Storage::delete('public/pemilih/' . $namaFoto);

            dd($exception->getMessage());
        }
    }

    /**
     * Update reset vote after checked
     *
     * @param  \App\Http\Requests\UpdatePemilihRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(UpdatePemilihRequest $request)
    {
        if (!$request->vote) {
            return back()->withErrors(['vote.*' => 'Checked Pemilih yang ingin di reset']);
        }

        DB::beginTransaction();

        try {
            $this->pemilih->deleteVoting($request->vote);

            DB::commit();

            Alert::success('Berhasil', 'Berhasil Hapus Vote yang di pilih');

            return back();
        } catch (Exception $exception) {
            DB::rollBack();

            dd($exception->getMessage());
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,xls,xlsx']
        ]);

        try {
            Excel::import(new PemilihImport, $request->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return back()->with('failures', $e->failures());
        }

        return back()->with('success', 'Berhasil Import Excel');
    }

    public function exportPdf()
    {
        $pdf = Pdf::loadView('admin.cetak.pemilih-pdf', [
            'pemilihs' => Pemilih::with(['voting' => ['calon']])->get()
        ]);

        return $pdf->stream('rekap-pemilih.pdf');
    }

    public function exportExcel()
    {
        return (new PemilihsExport)->download('rekap-pemilih.xlsx');
    }
}
