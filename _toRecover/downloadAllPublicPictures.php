<?php/* class zip
{
   private $zip;
   public function __construct( $file_name, $zip_directory)
   {
        $this->zip = new ZipArchive();
        $this->path = dirname( __FILE__ ) . $zip_directory . $file_name . '.zip';
        $this->zip->open( $this->path, ZipArchive::CREATE );
    }
    public function get_zip_path()
    {
        return $this->path;
    }   
       
    public function add_directory( $directory )
    {
        if( is_dir( $directory ) && $handle = opendir( $directory ) )
        {
            $this->zip->addEmptyDir( $directory );
            while( ( $file = readdir( $handle ) ) !== false )
            {
                if (!is_file($directory . '/' . $file))
                {
                    if (!in_array($file, array('.', '..')))
                    {
                        $this->add_directory($directory . '/' . $file );
                    }
                }
                else
                {
                    $this->add_file($directory . '/' . $file);                }
            }
        }
    }
    public function add_file( $path )
    {
        $this->zip->addFile( $path, $path);
    }
    public function save()
    {
        $this->zip->close();
    }
}

$zip_name = 'CHORVATSKO2018';
$zip_directory = '/';
$zip = new zip( $zip_name, $zip_directory );
$zip->add_directory( 'upload/public/' );
$zip->save();

$zip_path = $zip->get_zip_path();
header( "Pragma: public" );
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
header( "Cache-Control: public" );
header( "Content-Description: File Transfer" );
header( "Content-type: application/zip" );
header( "Content-Disposition: attachment; filename=\"" . $zip_name . "\"" );
header( "Content-Transfer-Encoding: binary" );
header( "Content-Length: " . filesize( $zip_path ) );

readfile( $zip_path );
 * 
 * 



    */
/*
$files = scandir(__DIR__. '/upload/public');
unset($files[0]);
unset($files[1]);
if (!empty($files)) {
	$zip = new ZipArchive();
	$zip->open(__DIR__ . '/archive.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

	foreach ($files as $file) {
		$zip->addFile(__DIR__. '/upload/public/' . $file, $file);
	}
	$zip->close();

	header('Content-Disposition: attachment; filename="' . basename('archive.zip') . '"');
	header('Content-Length: ' . filesize('archive.zip'));
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');

	readfile('archive.zip');
}

*/

?>