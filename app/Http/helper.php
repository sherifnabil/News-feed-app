<?php
if(!function_exists('featured'))
{
    function featured($arg)
    {       
        $file_new_name = 'uploads/posts/featured_photos/' . $arg->hashName();
        $arg->move( 'uploads/posts/featured_photos/', $file_new_name);
        return $file_new_name;
    }
}

if(!function_exists('update_featured'))
{
    function update_featured($arg1, $arg2)
    {
        file_exists($arg2->featured) ? unlink($arg2->featured) : '';
        $file_new_name = 'uploads/posts/featured_photos/' . $arg1->hashName();
        $arg1->move('uploads/posts/featured_photos/', $file_new_name);
        return $file_new_name;
    }
}

if(!function_exists('other_images'))
{
    function other_images($arg)
    {       
        $other_img_gainer = [];  
        if(is_array($arg)):
            foreach( $arg as $img):
                $file_new = 'uploads/posts/other_photos/' . $img->hashName();
                $img->move('uploads/posts/other_photos/', $file_new);
                $other_img_gainer[] =  $file_new;
            endforeach;
        else:
            $file_new = 'uploads/posts/other_photos/' . $arg->hashName();
            $img->move('uploads/posts/other_photos/', $file_new);
            $other_img_gainer[] =  $file_new;

        endif;
        $return_arg = implode('###', $other_img_gainer);
        return $return_arg;
    }
}

if(!function_exists('update_other_images'))
{
    function update_other_images($arg1, $arg2)
    {       
        $other_img_gainer = []; 
        foreach ($arg2->other_images_show as $imag) {
            if (file_exists( $imag)) {
                unlink($imag);
            }
        } 
        if(is_array($arg1)):
            foreach($arg1 as $img):

                $file_new = 'uploads/posts/other_photos/' . $img->hashName();
                $img->move('uploads/posts/other_photos/', $file_new);
                $other_img_gainer[] =  $file_new;
            endforeach;
        else:
            $file_new = 'uploads/posts/other_photos/' . $arg1->hashName();
            $img->move('uploads/posts/other_photos/', $file_new);
            $other_img_gainer[] =  $file_new;
        endif;
        $return_arg = implode('###', $other_img_gainer);
        return $return_arg;
    }
}