<?
include 'conf.php';
$strSQL ="SELECT photo.id, photo.photo_name, count(views.id) AS v_count FROM photo LEFT JOIN views ON photo.id =views.photo_id GROUP BY photo.id, photo.photo_name ORDER BY v_count DESC;";
$result =mysqli_query($conn,$strSQL);

if (mysqli_num_rows($result)>0){
	$html_str  ="";
	while($row = mysqli_fetch_assoc($result)){
		$imgFileName="img/small/".$row['photo_name'];
		$viewed = $row['v_count'];

		$html_str .="
		<div class =\"img-cover\">

                <a href=\"showBig.php?id=".$row['id']."\"target=\"_blank\"><img src=\"".$imgFileName."\"></a>

            <p>Просмотрено -".$row['v_count']." раз</p>
        </div>
		";
	}
	echo $html_str;
}

?>