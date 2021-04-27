<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use App\Utilities\Common;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $restaurants = Restaurant::where('id', '=', $keyword)
            ->orWhere('id', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate();

        //giúp chuyển trang page sẽ đính kèm theo từ khóa search của người dùng:
        $restaurants->appends(['search' => $keyword]);

        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $data = $request->all();

        //Bỏ trường này khỏi $data
        unset($data['image_old']);

        //File
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = Common::uploadFile($file, 'front/data-images/restaurants/');
            $data['image'] = $file_name;
        }

        //lưu dữ liệu vào database
        $restaurant = Restaurant::create($data);

        return redirect('admin/restaurant/' . $restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return view('admin.restaurant.create-edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, $id)
    {
        $data = $request->all();

        //Bỏ trường này khỏi $data
        unset($data['image_old']);

        //Xử lý file:
        if ($request->hasFile('image')) {
            //Thêm file mới:
            $data['image'] = Common::uploadFile($request->file('image'), 'front/data-images/restaurants/');

            //Xóa file cũ:
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/data-images/restaurants/' . $file_name_old);
            }
        }

        Restaurant::findOrFail($id)->update($data);

        return redirect('admin/restaurant/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['deleted'] = true;

        Restaurant::findOrFail($id)->update($data);

        return redirect('admin/restaurant');

    }
}
