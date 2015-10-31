<?php namespace App\Helpers;

class ImageUpload
{

    /**
     * @param $image_file_request
     * @param array $folder_list_max_dim_as_key
     * @return string
     */
    public function imageUpload($image_file_request, array $folder_list_max_dim_as_key)
    {
        $image = \Image::make( $image_file_request );
        $image_file_name = $this->getUniqueFileName( $image_file_request );

        foreach( $folder_list_max_dim_as_key as $desired_dim=>$folder_name )
        {
            list($max_width,  $max_height) = $this->getMaxDimension( $desired_dim );

            $image = $this->fitToWidth($image, $max_width);
            $image = $this->fitToHeight($image, $max_height);

            $image->save(storage_path($folder_name.'\\'.$image_file_name));
        }
        return $image_file_name;
    }

    /**
     * @param $image_obj
     * @param $max_allowed_width
     * @return mixed
     */
    protected function fitToWidth($image_obj, $max_allowed_width)
    {
        $image_width = $image_obj->width();
        if( $image_width > $max_allowed_width)
        {
            return $image_obj->widen($max_allowed_width);
        }
        return $image_obj;
    }

    /**
     * @param $image_obj
     * @param $max_allowed_height
     * @return mixed
     */
    protected function fitToHeight($image_obj, $max_allowed_height)
    {
        $image_height = $image_obj->height();
        if( $image_height > $max_allowed_height)
        {
            return $image_obj->heighten($max_allowed_height);
        }
        return $image_obj;
    }

    /**
     * @param $image_file
     * @return string
     */
    protected function getUniqueFileName( $image_file )
    {
        return md5($image_file->getClientOriginalName() . microtime()).'.'.$image_file->getClientOriginalExtension();
    }

    /**
     * @param $dimension
     * @return array
     */
    protected function getMaxDimension( $dimension ){
        $width_height = explode('X', $dimension );
        $max_width = $width_height[0];
        $max_height = $width_height[1];

        return [$max_width, $max_height];
    }
}