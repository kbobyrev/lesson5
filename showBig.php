<?
//показываем большую картинку и лобавляем просмотры
if (isset($_GET['id'])){
	include "conf.php";
	$photo_id = $_GET['id'];
	if (is_int($photo_id )){
		$strSQL_getImg ="SELECT photo.photo_name FROM photo WHERE photo.id = ".$photo_id.";";
		$strSQL_newView = "INSERT INTO views(photo_id) VALUES (".$photo_id.");";
		$template = file_get_contents('bigImg.tpl');

		$result = mysqli_query($conn,$strSQL_getImg);
		if (mysqli_num_rows($result) > 0) {
			$row =mysqli_fetch_assoc($result);

			$imgFileName="img/big/".$row['photo_name'];
			$content = '<img src="'.$imgFileName.'" alt="pic">';
			$title = $row['photo_name'];

		

			$patterns = array( '/{title}/', '/{content}/' );
			$replace = array( $title, $content );
			echo preg_replace( $patterns, $replace, $template);
		}else{

			echo "File hasnt founded";
		}
}else{
	echo "var is empty";
}
mysqli_query($conn,$strSQL_newView);
?>