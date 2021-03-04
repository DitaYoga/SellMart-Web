<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tanaman;
use\File;
use Illuminate\Support\Str;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanaman= Tanaman::get();
        return view('tanaman',['tanaman'=>$tanaman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah');
    }
    public function addcart($id)
    {
        session_start();
        if(!in_array($id, $_SESSION['cart'])){
            array_push($_SESSION['cart'], $id);
            $_SESSION['message'] = 'Product added to cart';
        }
        else{
            $_SESSION['message'] = 'Product already in cart';
        }
        return redirect('/tanaman');
    }
    public function viewcart()
    {
        session_start();
        return view('viewcart');
    }
    public function clearcart()
    {
        session_start();
        unset($_SESSION['cart']);

        return redirect('chart');
    }
    public function savecart(request $request)
    {
        session_start();
        if(isset($_POST['save'])){
            foreach($request->indexes as $key){
                $_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
            }
        }
        return redirect('chart');
    }
    public function deletecart($id,$index)
    {
        session_start();

        //remove the id from our cart array
        $key = array_search($id, $_SESSION['cart']);    
        unset($_SESSION['cart'][$key]);

        unset($_SESSION['qty_array'][$index]);
        //rearrange array after unset
        $_SESSION['qty_array'] = array_values($_SESSION['qty_array']);
        return redirect('chart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'photo' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // Menyimpan data gambar yang diupload yang disimpan di variable gambar
        $gambar= $request->file('photo');
        $file_name= date('Y-m-d')."_".$gambar->getClientOriginalName();

        // isi dengan nama folder tempat kemana gambar diupload
        $tujuan_upload= 'image';
        $gambar->move($tujuan_upload, $file_name);

        Tanaman::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'price' => $request->price,
            'stok' => $request->stok,
            'photo' => $file_name,
        ]);
        return redirect('/tanaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanaman= Tanaman::where('id', $id)->first();
        return view('admin.edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tanaman= Tanaman::where('id', $id)->first();

        if($request->hasFile('gambar')){
            $request->validate([
                'name' => 'required',
                'deskripsi' => 'required',
                'price' => 'required',
                'stok' => 'required',
                'photo' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);

            // Menyimpan data gambar yang diupload yang disimpan di variable gambar
            $gambar= $request->file('photo');
            $file_name= date('Y-m-d')."_".$gambar->getClientOriginalName();
            // mengambil data gambar yang sesuai
            $request->file('photo')->storeAs('public/image',$file_name);
            // isi dengan nama folder tempat kemana gambar diupload
            $tujuan_upload = 'image';
            $gambar->move($tujuan_upload,$file_name);
            File::delete('image/'.$tanaman->gambar);

            $tanaman->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'price' => $request->price,
                'stok' => $request->stok,
                'photo' => $file_name,
            ]);
        } else{
            $request->validate([
                'name' => 'required',
                'deskripsi' => 'required',
                'price' => 'required',
                'stok' => 'required',
            ]);

            $tanaman->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'price' => $request->price,
                'stok' => $request->stok,
            ]);
        }
        return redirect('/tanaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $tanaman = Tanaman::where('id', $id)->first();
        File::delete('image/'.$tanaman->gambar);

        // hapus data
        Tanaman::where('id', $id)->delete();
        return redirect('/tanaman');
    }
}
