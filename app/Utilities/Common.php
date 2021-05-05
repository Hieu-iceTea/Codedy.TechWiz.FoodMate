<?php


namespace App\Utilities;


use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Common
{
    /**
     *
     * //Xử lý file:<br>
     * if ($request->hasFile('image')) {<br>
     * $data['image'] = Common::uploadFile($request->file('image'), 'image_path');<br>
     * }
     *
     * @param $file 'Chú ý thêm trường này trong <form>: enctype="multipart/form-data"'
     * @param $path 'Không để ký tự / ở đầu hoặc cuối'
     * @return string
     */
    public static function uploadFile($file, $path)
    {
        $file_name_original = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file_name_without_extension = Str::replaceLast('.' . $extension, '', $file_name_original);

        $str_time_now = Carbon::now()->format('ymd_his');
        $file_name = Str::slug($file_name_without_extension) . '_' . uniqid() . '_' . $str_time_now . '.' . $extension;

        $file->move($path, $file_name);

        return $file_name;
    }
}
