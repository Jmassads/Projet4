<?php

    class Uploader
    {
        private $errors = array();

        public function addError($msg)
        {
            $this->errors[] = $msg;
        }

        public function getError()
        {
            return $this->errors;
        }

        public function uploadFile($fileToUpload)
        {
            $errors = array();
            $file_name   =   str_replace(' ', '', $_FILES[$fileToUpload]['name']); //Le nom original du fichier
            $file_size   =   $_FILES[$fileToUpload]["size"]; //La taille du fichier en octets.
            $file_tmp    =   $_FILES[$fileToUpload]['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
            $file_parts  =   explode('.', $file_name);
            $file_ext    =   strtolower(end($file_parts));
            $extensions  =   array("jpeg","jpg","png", "gif");
            // $ext         =   $this->getExtension($file_name);

            if (in_array($file_ext, $extensions)=== false) {
                // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                $this->addError("Les fichiers autorises sont: .jpg, .jpeg, .png, .gif");
            }

            if ($file_size > 500000) {
                // Kilooctet (Kilobyte) (kB)
                // 500000 B(Octet)(Byte) = ~ 500KB (488);
                $this->addError("Le fichier ne doit pas depasser les 500KB");
            }

            if (empty($this->errors)) {
                move_uploaded_file($file_tmp, "uploads/".$file_name);
                return true;
            } else {
                return false;
            }
        }
    }
