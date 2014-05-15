<?php
class CustomUploadHandler extends UploadHandler
{

    /*protected function handle_form_data($file, $index) {
        $file->title = $_REQUEST['title'][$index];
        $file->description = $_REQUEST['description'][$index];
    }*/



    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        $versions = $this->options['image_versions'];

        $meta_data = [
            'file' => $this->get_upload_path($file->name),
            'type' => $file->type,
            'size' => $file->size,
        ];

        foreach($versions as $version => $val)
        {
            $meta_data['sizes'][$version] = $this->get_upload_path($file->name, $version);
        }


        if (empty($file->error)) {

            $post = new PPost;

            $post->post_title       = $this->removeExtension($file->name);
            //$post->post_content     = '';
            $post->post_type        = 'attachment';
            $post->author_id        = Auth::User()->id;
            $post->comment_status   = 'close';
            $post->post_parent      = 0;
            $post->guid             = $file->url;
            $post->menu_order       = 0;
            $post->post_mimetype    = $file->type;
            $post->post_date        = date('Y-m-d H:i:s');
            $post->updated_at       = date('Y-m-d H:i:s');
            $post->post_status      = 'Published';

            if( $post->save() )
            {
                $meta = new PostMeta;
                $meta->update_postmeta($post->id, 'attachment_metadata', json_encode($meta_data));
            }

        }
        return $file;
    }

    public function removeExtension($filename)
    {
        return preg_replace("/\\.[^.\\s]{3,4}$/", "", $filename);   
    }


}