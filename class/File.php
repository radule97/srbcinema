<?php
class File {



	/**
	 * @param $inputName
	 * @param string $target_dir
	 * @return bool|string
	 */
	public function upload($inputName, $target_dir = "uploads/") {
		//Uploading Image
//		$target_dir = "../uploads/";

        if (isset($_FILES[$inputName]["name"]) && $_FILES[$inputName]["name"])
        {

            $target_file = $target_dir . basename($_FILES[$inputName]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"]))
            {
                $check = getimagesize($_FILES[$inputName]["tmp_name"]);
                if ($check !== false)
                {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file))
            {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES[$inputName]["size"] > 500000)
            {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            }
            else {
                if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file))
                {
                    echo "The file " . basename($_FILES[$inputName]["name"]) . " has been uploaded.";
                    return $target_file;
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }
		return FALSE;
	}


}
?>