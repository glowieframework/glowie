<?php

    /**
     * File upload helper for Glowie application.
     * @category File uploads
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Uploader{
        private $directory;
        private $error;
        private $extensions;
        private $maxFileSize;
        private $replace;

        public function __construct(string $directory = 'uploads', array $extensions = [], int $maxFileSize = 0, bool $replace = false){
            if(empty($directory) || trim($directory) == '') trigger_error('Uploader: Target directory should not be empty');
            if(!is_dir($directory) || !is_writable($directory)) trigger_error('Uploader: Target directory is invalid or not writable');
            if(!is_array($extensions)) trigger_error('Uploader: Extensions must be an array');

            $this->directory = $directory;
            $this->error = '';
            $this->extensions = $extensions;
            $this->maxFileSize = $maxFileSize;
            $this->replace = $replace;
        }

        public function upload(string $input){
            if(!empty($_FILES[$input])){
                $files = $this->arrangeFiles($input);

                // Single file upload
                if(count($files) == 1){
                    if(!empty($files[0]['name'])){
                        if($files[0]['size'] <= $this->maxFileSize){
                            if(in_array($this->getExtension($files[0]['name']), $this->extensions)){
                                
                                $targetName = '';
                                
                            }else{
                                $this->error = 'INVALID_EXTENSION';
                                return false;
                            }
                        }else{
                            $this->error = 'INVALID_SIZE';
                            return false;
                        }
                    }else{
                        $this->error = 'FILE_NOT_SELECTED';
                        return false;
                    }
                }else{
                    // Multiple files upload
                }
            }
        }

        private function getExtension(string $filename){
            $parts = explode('.', $filename);
            if(count($parts) == 0) return '';
            return strtolower($parts[count($parts) - 1]);
        }

        private function arrangeFiles(&$file_post){
            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
            return $file_ary;
        }

    }

?>