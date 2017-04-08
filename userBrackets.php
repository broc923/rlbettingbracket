<?php
require('connectDB.php');
$id = $_POST['steam'];
$stmt2 = $conn->prepare("SELECT COUNT(ID) FROM brackets WHERE SteamID = '$id'");
$stmt2->execute();
$result2 = $stmt2->fetchColumn();

if ($result2 <= 0) {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("INSERT INTO brackets (ID, SteamID, upGame1, upGame2, upGame3, upGame4, upGame1Round2, upGame2Round2, upGame1Round3, upGame1Round4, lowGame1Round1, lowGame2Round1, lowGame1Round2, lowGame2Round2, lowGame1Round3, lowGame1Round4, loser1, loser2, loser3, loser4, loser5, loser6, loser7, loser8, loser9, loser10, loser11, loser12, loser13, loser14)
											VALUES ('', :steamID, :upGame1, :upGame2, :upGame3, :upGame4, :upGame1Round2, :upGame2Round2, :upGame1Round3, :upGame1Round4, :lowGame1Round1, :lowGame2Round1, :lowGame1Round2, :lowGame2Round2, :lowGame1Round3, :lowGame1Round4, :loser1, :loser2, :loser3, :loser4, :loser5, :loser6, :loser7, :loser8, :loser9, :loser11, :loser11, :loser12, :loser13, :loser14)");
					$stmt->bindParam(':steamID', $steamID);
					$stmt->bindParam(':upGame1', $upGame1);
					$stmt->bindParam(':upGame2', $upGame2);
					$stmt->bindParam(':upGame3', $upGame3);
					$stmt->bindParam(':upGame4', $upGame4);
					$stmt->bindParam(':upGame1Round2', $upGame1Round2);
					$stmt->bindParam(':upGame2Round2', $upGame2Round2);
					$stmt->bindParam(':upGame1Round3', $upGame1Round3);
					$stmt->bindParam(':upGame1Round4', $upGame1Round4);
					$stmt->bindParam(':lowGame1Round1', $lowGame1Round1);
					$stmt->bindParam(':lowGame2Round1', $lowGame2Round1);
					$stmt->bindParam(':lowGame1Round2', $lowGame1Round2);
					$stmt->bindParam(':lowGame2Round2', $lowGame2Round2);
					$stmt->bindParam(':lowGame1Round3', $lowGame1Round3);
					$stmt->bindParam(':lowGame1Round4', $lowGame1Round4);
					$stmt->bindParam(':loser1', $loser1);
					$stmt->bindParam(':loser2', $loser2);
					$stmt->bindParam(':loser3', $loser3);
					$stmt->bindParam(':loser4', $loser4);
					$stmt->bindParam(':loser5', $loser5);
					$stmt->bindParam(':loser6', $loser6);
					$stmt->bindParam(':loser7', $loser7);
					$stmt->bindParam(':loser8', $loser8);
					$stmt->bindParam(':loser9', $loser9);
					$stmt->bindParam(':loser10', $loser10);
					$stmt->bindParam(':loser11', $loser11);
					$stmt->bindParam(':loser12', $loser12);
					$stmt->bindParam(':loser13', $loser13);
					$stmt->bindParam(':loser14', $loser14);
					$steamID = $_POST['steam'];
					$upGame1 = $_POST['winners1'];
					$upGame2 = $_POST['winners2'];
					$upGame3 = $_POST['winners3'];
					$upGame4 = $_POST['winners4'];
					$upGame1Round2 = $_POST['winners5'];
					$upGame2Round2 = $_POST['winners6'];
					$upGame1Round3 = $_POST['winners7'];
					$upGame1Round4 = $_POST['winners8'];
					$lowGame1Round1 = $_POST['winners9'];
					$lowGame2Round1 = $_POST['winners10'];
					$lowGame1Round2 = $_POST['winners11'];
					$lowGame2Round2 = $_POST['winners12'];
					$lowGame1Round3 = $_POST['winners13'];
					$lowGame1Round4 = $_POST['winners14'];
					$loser1 = $_POST['loser1'];
					$loser2 = $_POST['loser2'];
					$loser3 = $_POST['loser3'];
					$loser4 = $_POST['loser4'];
					$loser5 = $_POST['loser5'];
					$loser6 = $_POST['loser6'];
					$loser7 = $_POST['loser7'];
					$loser8 = $_POST['loser8'];
					$loser9 = $_POST['loser9'];
					$loser10 = $_POST['loser10'];
					$loser11 = $_POST['loser11'];
					$loser12 = $_POST['loser12'];
					$loser13 = $_POST['loser13'];
					$loser14 = $_POST['loser14'];

		$stmt->execute();
}
?>