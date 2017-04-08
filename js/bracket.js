	//global variables
	var pickedWinners = [];
	var pickedLosers = [];
	//upper round 1
	function selected1() {
		var teamNameWin = document.getElementById("team1Name").textContent;
		var teamNameLose = document.getElementById("team2Name").textContent;
		if (document.getElementById("team1").className == "tournament-bracket__team") {
			document.getElementById("team1Name").style.color = "green";
			document.getElementById("team2Name").style.color = "black";
			document.getElementById("team1").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team2").className = "tournament-bracket__team";
			document.getElementById("team1Name2").innerHTML = teamNameWin;
			document.getElementById("team1Name1Lower").innerHTML = teamNameLose;
			pickedWinners[0] = teamNameWin;
			pickedLosers[0] = teamNameLose;
		}
	}
	function selected2() {
		var teamNameWin = document.getElementById("team2Name").textContent;
		var teamNameLose = document.getElementById("team1Name").textContent;
		if (document.getElementById("team2").className == "tournament-bracket__team") {
			document.getElementById("team2Name").style.color = "green";
			document.getElementById("team1Name").style.color = "black";
			document.getElementById("team2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team1").className = "tournament-bracket__team";
			document.getElementById("team1Name2").innerHTML = teamNameWin;
			document.getElementById("team1Name1Lower").innerHTML = teamNameLose;
			pickedWinners[0] = teamNameWin;
			pickedLosers[0] = teamNameLose;
		}
	}
	function selected3() {
		var teamNameWin = document.getElementById("team3Name").textContent;
		var teamNameLose = document.getElementById("team4Name").textContent;
		if (document.getElementById("team3").className == "tournament-bracket__team") {
			document.getElementById("team3Name").style.color = "green";
			document.getElementById("team4Name").style.color = "black";
			document.getElementById("team3").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team4").className = "tournament-bracket__team";
			document.getElementById("team2Name2").innerHTML = teamNameWin;
			document.getElementById("team2Name1Lower").innerHTML = teamNameLose;
			pickedWinners[1] = teamNameWin;
			pickedLosers[1] = teamNameLose;
		}
	}
	function selected4() {
		var teamNameWin = document.getElementById("team4Name").textContent;
		var teamNameLose = document.getElementById("team3Name").textContent;
		if (document.getElementById("team4").className == "tournament-bracket__team") {
			document.getElementById("team4Name").style.color = "green";
			document.getElementById("team3Name").style.color = "black";
			document.getElementById("team4").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team3").className = "tournament-bracket__team";
			document.getElementById("team2Name2").innerHTML = teamNameWin;
			document.getElementById("team2Name1Lower").innerHTML = teamNameLose;
			pickedWinners[1] = teamNameWin;
			pickedLosers[1] = teamNameLose;
		}
	}
	function selected5() {
		var teamNameWin = document.getElementById("team5Name").textContent;
		var teamNameLose = document.getElementById("team6Name").textContent;
		if (document.getElementById("team5").className == "tournament-bracket__team") {
			document.getElementById("team5Name").style.color = "green";
			document.getElementById("team6Name").style.color = "black";
			document.getElementById("team5").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team6").className = "tournament-bracket__team";
			document.getElementById("team3Name2").innerHTML = teamNameWin;
			document.getElementById("team3Name1Lower").innerHTML = teamNameLose;
			pickedWinners[2] = teamNameWin;
			pickedLosers[2] = teamNameLose;			
		}
	}
	function selected6() {
		var teamNameWin = document.getElementById("team6Name").textContent;
		var teamNameLose = document.getElementById("team5Name").textContent;
		if (document.getElementById("team6").className == "tournament-bracket__team") {
			document.getElementById("team6Name").style.color = "green";
			document.getElementById("team5Name").style.color = "black";
			document.getElementById("team6").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team5").className = "tournament-bracket__team";
			document.getElementById("team3Name2").innerHTML = teamNameWin;
			document.getElementById("team3Name1Lower").innerHTML = teamNameLose;
			pickedWinners[2] = teamNameWin;
			pickedLosers[2] = teamNameLose;
		}
	}
	function selected7() {
		var teamNameWin = document.getElementById("team7Name").textContent;
		var teamNameLose = document.getElementById("team8Name").textContent;
		if (document.getElementById("team7").className == "tournament-bracket__team") {
			document.getElementById("team7Name").style.color = "green";
			document.getElementById("team8Name").style.color = "black";
			document.getElementById("team7").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team8").className = "tournament-bracket__team";
			document.getElementById("team4Name2").innerHTML = teamNameWin;
			document.getElementById("team4Name1Lower").innerHTML = teamNameLose;
			pickedWinners[3] = teamNameWin;
			pickedLosers[3] = teamNameLose;
		}
	}
	function selected8() {
		var teamNameWin = document.getElementById("team8Name").textContent;
		var teamNameLose = document.getElementById("team7Name").textContent;
		if (document.getElementById("team8").className == "tournament-bracket__team") {
			document.getElementById("team8Name").style.color = "green";
			document.getElementById("team7Name").style.color = "black";
			document.getElementById("team8").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team7").className = "tournament-bracket__team";
			document.getElementById("team4Name2").innerHTML = teamNameWin;
			document.getElementById("team4Name1Lower").innerHTML = teamNameLose;
			pickedWinners[3] = teamNameWin;
			pickedLosers[3] = teamNameLose;
		}
	}
	//upper round 2
	function selectedRound2Team1() {
		var teamNameWin = document.getElementById("team1Name2").textContent;
		var teamNameLose = document.getElementById("team2Name2").textContent;
		if (document.getElementById("team1Round2").className == "tournament-bracket__team") {
			document.getElementById("team1Name2").style.color = "green";
			document.getElementById("team2Name2").style.color = "black";
			document.getElementById("team1Round2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team2Round2").className = "tournament-bracket__team";
			document.getElementById("team1Name3").innerHTML = teamNameWin;
			document.getElementById("team3Name2Lower").innerHTML = teamNameLose;	
			pickedWinners[4] = teamNameWin;
			pickedLosers[4] = teamNameLose;
		}
	}
	function selectedRound2Team2() {
		var teamNameWin = document.getElementById("team2Name2").textContent;
		var teamNameLose = document.getElementById("team1Name2").textContent;
		if (document.getElementById("team2Round2").className == "tournament-bracket__team") {
			document.getElementById("team2Name2").style.color = "green";
			document.getElementById("team1Name2").style.color = "black";
			document.getElementById("team2Round2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team1Round2").className = "tournament-bracket__team";
			document.getElementById("team1Name3").innerHTML = teamNameWin;
			document.getElementById("team3Name2Lower").innerHTML = teamNameLose;
			pickedWinners[4] = teamNameWin;
			pickedLosers[4] = teamNameLose;			
		}
	}
	function selectedRound2Team3() {
		var teamNameWin = document.getElementById("team3Name2").textContent;
		var teamNameLose = document.getElementById("team4Name2").textContent;
		if (document.getElementById("team3Round2").className == "tournament-bracket__team") {
			document.getElementById("team3Name2").style.color = "green";
			document.getElementById("team4Name2").style.color = "black";
			document.getElementById("team3Round2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team4Round2").className = "tournament-bracket__team";
			document.getElementById("team2Name3").innerHTML = teamNameWin;
			document.getElementById("team1Name2Lower").innerHTML = teamNameLose;
			pickedWinners[5] = teamNameWin;
			pickedLosers[5] = teamNameLose;
		}
	}
	function selectedRound2Team4() {
		var teamNameWin = document.getElementById("team4Name2").textContent;
		var teamNameLose = document.getElementById("team3Name2").textContent;
		if (document.getElementById("team4Round2").className == "tournament-bracket__team") {
			document.getElementById("team4Name2").style.color = "green";
			document.getElementById("team3Name2").style.color = "black";
			document.getElementById("team4Round2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team3Round2").className = "tournament-bracket__team";
			document.getElementById("team2Name3").innerHTML = teamNameWin;
			document.getElementById("team1Name2Lower").innerHTML = teamNameLose;
			pickedWinners[5] = teamNameWin;
			pickedLosers[5] = teamNameLose;
		}
	}
	//upper round 3 semifinals
	function selectedRound3Team1() {
		var teamNameWin = document.getElementById("team1Name3").textContent;
		var teamNameLose = document.getElementById("team2Name3").textContent;
		if (document.getElementById("team1Round3").className == "tournament-bracket__team") {
			document.getElementById("team1Name3").style.color = "green";
			document.getElementById("team2Name3").style.color = "black";
			document.getElementById("team1Round3").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team2Round3").className = "tournament-bracket__team";
			document.getElementById("team1Name4").innerHTML = teamNameWin;
			document.getElementById("team1Name4Lower").innerHTML = teamNameLose;
			pickedWinners[6] = teamNameWin;
			pickedLosers[6] = teamNameLose;
		}
	}
	function selectedRound3Team2() {
		var teamNameWin = document.getElementById("team2Name3").textContent;
		var teamNameLose = document.getElementById("team1Name3").textContent;
		if (document.getElementById("team2Round3").className == "tournament-bracket__team") {
			document.getElementById("team2Name3").style.color = "green";
			document.getElementById("team1Name3").style.color = "black";
			document.getElementById("team2Round3").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team1Round3").className = "tournament-bracket__team";
			document.getElementById("team1Name4").innerHTML = teamNameWin;
			document.getElementById("team1Name4Lower").innerHTML = teamNameLose;
			pickedWinners[6] = teamNameWin;	
			pickedLosers[6] = teamNameLose;
		}
	}
	//upper round 4 finals
	function selectedRound4Team1() {
		var teamNameWin = document.getElementById("team1Name4").textContent;
		var teamNameLose = document.getElementById("team2Name4").textContent;
		if (document.getElementById("team1Round4").className == "tournament-bracket__team") {
			document.getElementById("team1Name4").style.color = "green";
			document.getElementById("team2Name4").style.color = "black";
			document.getElementById("team1Round4").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team2Round4").className = "tournament-bracket__team";
			pickedWinners[7] = teamNameWin;	
			pickedLosers[7] = teamNameLose;
		}
	}
	function selectedRound4Team2() {
		var teamNameWin = document.getElementById("team2Name4").textContent;
		var teamNameLose = document.getElementById("team1Name4").textContent;
		if (document.getElementById("team2Round4").className == "tournament-bracket__team") {
			document.getElementById("team2Name4").style.color = "green";
			document.getElementById("team1Name4").style.color = "black";
			document.getElementById("team2Round4").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("team1Round4").className = "tournament-bracket__team";
			pickedWinners[7] = teamNameWin;	
			pickedLosers[7] = teamNameLose;
		}
	}
	//lower round 1
	function selectedRound1Team1Lower() {
		var teamNameWin = document.getElementById("team1Name1Lower").textContent;
		var teamNameLose = document.getElementById("team2Name1Lower").textContent;
		if (document.getElementById("lower1Team1").className == "tournament-bracket__team") {
			document.getElementById("team1Name1Lower").style.color = "green";
			document.getElementById("team2Name1Lower").style.color = "black";
			document.getElementById("lower1Team1").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower1Team2").className = "tournament-bracket__team";
			document.getElementById("team2Name2Lower").innerHTML = teamNameWin;
			pickedWinners[8] = teamNameWin;
			pickedLosers[8] = teamNameLose;
		}
	}
	function selectedRound1Team2Lower() {
		var teamNameWin = document.getElementById("team2Name1Lower").textContent;
		var teamNameLose = document.getElementById("team1Name1Lower").textContent;
		if (document.getElementById("lower1Team2").className == "tournament-bracket__team") {
			document.getElementById("team2Name1Lower").style.color = "green";
			document.getElementById("team1Name1Lower").style.color = "black";
			document.getElementById("lower1Team2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower1Team1").className = "tournament-bracket__team";
			document.getElementById("team2Name2Lower").innerHTML = teamNameWin;
			pickedWinners[8] = teamNameWin;
			pickedLosers[8] = teamNameLose;
		}
	}
	function selectedRound1Team3Lower() {
		var teamNameWin = document.getElementById("team3Name1Lower").textContent;
		var teamNameLose = document.getElementById("team4Name1Lower").textContent;
		if (document.getElementById("lower1Team3").className == "tournament-bracket__team") {
			document.getElementById("team3Name1Lower").style.color = "green";
			document.getElementById("team4Name1Lower").style.color = "black";
			document.getElementById("lower1Team3").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower1Team4").className = "tournament-bracket__team";
			document.getElementById("team4Name2Lower").innerHTML = teamNameWin;
			pickedWinners[9] = teamNameWin;
			pickedLosers[9] = teamNameLose;
		}
	}
	function selectedRound1Team4Lower() {
		var teamNameWin = document.getElementById("team4Name1Lower").textContent;
		var teamNameLose = document.getElementById("team3Name1Lower").textContent;
		if (document.getElementById("lower1Team4").className == "tournament-bracket__team") {
			document.getElementById("team4Name1Lower").style.color = "green";
			document.getElementById("team3Name1Lower").style.color = "black";
			document.getElementById("lower1Team4").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower1Team3").className = "tournament-bracket__team";
			document.getElementById("team4Name2Lower").innerHTML = teamNameWin;
			pickedWinners[9] = teamNameWin;
			pickedLosers[9] = teamNameLose;
		}
	}
	//lower round 2
	function selectedRound2Team1Lower() {
		var teamNameWin = document.getElementById("team1Name2Lower").textContent;
		var teamNameLose = document.getElementById("team2Name2Lower").textContent;
		if (document.getElementById("lower2Team1").className == "tournament-bracket__team") {
			document.getElementById("team1Name2Lower").style.color = "green";
			document.getElementById("team2Name2Lower").style.color = "black";
			document.getElementById("lower2Team1").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower2Team2").className = "tournament-bracket__team";
			document.getElementById("team1Name3Lower").innerHTML = teamNameWin;
			pickedWinners[10] = teamNameWin;
			pickedLosers[10] = teamNameLose;
		}
	}
	function selectedRound2Team2Lower() {
		var teamNameWin = document.getElementById("team2Name2Lower").textContent;
		var teamNameLose = document.getElementById("team1Name2Lower").textContent;
		if (document.getElementById("lower2Team2").className == "tournament-bracket__team") {
			document.getElementById("team2Name2Lower").style.color = "green";
			document.getElementById("team1Name2Lower").style.color = "black";
			document.getElementById("lower2Team2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower2Team1").className = "tournament-bracket__team";
			document.getElementById("team1Name3Lower").innerHTML = teamNameWin;
			pickedWinners[10] = teamNameWin;
			pickedLosers[10] = teamNameLose;
		}
	}
	function selectedRound2Team3Lower() {
		var teamNameWin = document.getElementById("team3Name2Lower").textContent;
		var teamNameLose = document.getElementById("team4Name2Lower").textContent;
		if (document.getElementById("lower2Team3").className == "tournament-bracket__team") {
			document.getElementById("team3Name2Lower").style.color = "green";
			document.getElementById("team4Name2Lower").style.color = "black";
			document.getElementById("lower2Team3").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower2Team4").className = "tournament-bracket__team";
			document.getElementById("team2Name3Lower").innerHTML = teamNameWin;
			pickedWinners[11] = teamNameWin;
			pickedLosers[11] = teamNameLose;
		}
	}
	function selectedRound2Team4Lower() {
		var teamNameWin = document.getElementById("team4Name2Lower").textContent;
		var teamNameLose = document.getElementById("team3Name2Lower").textContent;
		if (document.getElementById("lower2Team4").className == "tournament-bracket__team") {
			document.getElementById("team4Name2Lower").style.color = "green";
			document.getElementById("team3Name2Lower").style.color = "black";
			document.getElementById("lower2Team4").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower2Team3").className = "tournament-bracket__team";
			document.getElementById("team2Name3Lower").innerHTML = teamNameWin;
			pickedWinners[11] = teamNameWin;
			pickedLosers[11] = teamNameLose;
		}
	}
	//lower round 3
	function selectedRound3Team1Lower() {
		var teamNameWin = document.getElementById("team1Name3Lower").textContent;
		var teamNameLose = document.getElementById("team2Name3Lower").textContent;
		if (document.getElementById("lower3Team1").className == "tournament-bracket__team") {
			document.getElementById("team1Name3Lower").style.color = "green";
			document.getElementById("team2Name3Lower").style.color = "black";
			document.getElementById("lower3Team1").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower3Team2").className = "tournament-bracket__team";
			document.getElementById("team2Name4Lower").innerHTML = teamNameWin;
			pickedWinners[12] = teamNameWin;
			pickedLosers[12] = teamNameLose;
		}
	}
	function selectedRound3Team2Lower() {
		var teamNameWin = document.getElementById("team2Name3Lower").textContent;
		var teamNameLose = document.getElementById("team1Name3Lower").textContent;
		if (document.getElementById("lower3Team2").className == "tournament-bracket__team") {
			document.getElementById("team2Name3Lower").style.color = "green";
			document.getElementById("team1Name3Lower").style.color = "black";
			document.getElementById("lower3Team2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower3Team1").className = "tournament-bracket__team";
			document.getElementById("team2Name4Lower").innerHTML = teamNameWin;
			pickedWinners[12] = teamNameWin;
			pickedLosers[12] = teamNameLose;			
		}
	}
	//lower round 4
	function selectedRound4Team1Lower() {
		var teamNameWin = document.getElementById("team1Name4Lower").textContent;
		var teamNameLose = document.getElementById("team2Name4Lower").textContent;
		if (document.getElementById("lower4Team1").className == "tournament-bracket__team") {
			document.getElementById("team1Name4Lower").style.color = "green";
			document.getElementById("team2Name4Lower").style.color = "black";
			document.getElementById("lower4Team1").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower4Team2").className = "tournament-bracket__team";
			document.getElementById("team2Name4").innerHTML = teamNameWin;	
			pickedWinners[13] = teamNameWin;
			pickedLosers[13] = teamNameLose;
		}
	}
	function selectedRound4Team2Lower() {
		var teamNameWin = document.getElementById("team2Name4Lower").textContent;
		var teamNameLose = document.getElementById("team1Name4Lower").textContent;
		if (document.getElementById("lower4Team2").className == "tournament-bracket__team") {
			document.getElementById("team2Name4Lower").style.color = "green";
			document.getElementById("team1Name4Lower").style.color = "black";
			document.getElementById("lower4Team2").className = "tournament-bracket__team tournament-bracket__team--winner";
			document.getElementById("lower4Team1").className = "tournament-bracket__team";
			document.getElementById("team2Name4").innerHTML = teamNameWin;	
			pickedWinners[13] = teamNameWin;
			pickedLosers[13] = teamNameLose;
		}
	}
	//lower round 3 bracket display fixed
	function updateRound3Lower(winner) {
		var teamNameLeft = document.getElementById("team1Name3Lower").textContent;
		var teamNameRight = document.getElementById("team2Name3Lower").textContent;
		if (teamNameLeft == winner){
			selectedRound3Team1Lower();
		} else if (teamNameRight == winner) {
			selectedRound3Team2Lower();
		}
	}
	//lower round 4 bracket display fixed
	function updateRound4Lower(winner) {
		var teamNameLeft = document.getElementById("team1Name4Lower").textContent;
		var teamNameRight = document.getElementById("team2Name4Lower").textContent;
		if (teamNameLeft == winner){
			selectedRound4Team1Lower();
		} else if (teamNameRight == winner) {
			selectedRound4Team2Lower();
		}
	}
	//final bracket display fixed
	function updateRound4Upper(winner) {
		var teamNameLeft = document.getElementById("team1Name4").textContent;
		var teamNameRight = document.getElementById("team2Name4").textContent;
		if (teamNameLeft == winner){
			selectedRound4Team1();
		} else if (teamNameRight == winner) {
			selectedRound4Team2();
		}
	}
	//submission
	function submit(steamID) {
		var x = confirm("Are you sure you would like to submit this bracket?");
		var missing = "";
		var submit = true;
		if (x) {
			if (pickedWinners[0] == undefined){
				missing += "1,";
				submit = false;
			}
			if (pickedWinners[1] == undefined){
				missing += "2,";
				submit = false;
			}
			if (pickedWinners[2] == undefined){
				missing += "3,";
				submit = false;
			}
			if (pickedWinners[3] == undefined){
				missing += "4,";
				submit = false;
			}
			if (pickedWinners[4] == undefined){
				missing += "5,";
				submit = false;
			}
			if (pickedWinners[5] == undefined){
				missing += "6,";
				submit = false;
			}
			if (pickedWinners[6] == undefined){
				missing += "7,";
				submit = false;
			}
			if (pickedWinners[7] == undefined){
				missing += "8,";
				submit = false;
			}
			if (pickedWinners[8] == undefined){
				missing += "9,";
				submit = false;
			}
			if (pickedWinners[9] == undefined){
				missing += "10,";
				submit = false;
			}
			if (pickedWinners[10] == undefined){
				missing += "11,";
				submit = false;
			}
			if (pickedWinners[11] == undefined){
				missing += "12,";
				submit = false;
			}
			if (pickedWinners[12] == undefined){
				missing += "13,";
				submit = false;
			}
			if (pickedWinners[13] == undefined){
				missing += "14";
				submit = false;
			}
			if (submit == true) {
				$.ajax({
					url: '../userBrackets.php',
					type: 'POST',
					dataType: "json",
					data: {
						winners1: pickedWinners[0],
						winners2: pickedWinners[1],
						winners3: pickedWinners[2],
						winners4: pickedWinners[3],
						winners5: pickedWinners[4],
						winners6: pickedWinners[5],
						winners7: pickedWinners[6],
						winners8: pickedWinners[7],
						winners9: pickedWinners[8],
						winners10: pickedWinners[9],
						winners11: pickedWinners[10],
						winners12: pickedWinners[11],
						winners13: pickedWinners[12],
						winners14: pickedWinners[13],
						loser1: pickedLosers[0],
						loser2: pickedLosers[1],
						loser3: pickedLosers[2],
						loser4: pickedLosers[3],
						loser5: pickedLosers[4],
						loser6: pickedLosers[5],
						loser7: pickedLosers[6],
						loser8: pickedLosers[7],
						loser9: pickedLosers[8],
						loser10: pickedLosers[9],
						loser11: pickedLosers[10],
						loser12: pickedLosers[11],
						loser13: pickedLosers[12],
						loser14: pickedLosers[13],
						steam: steamID
					}
				});
				location.reload();
			} else {
				alert("Game " + missing + " seems to be missing properly selected winners. It's probably our fault, try the reset button and report the bug to us!");
			}
		} else {
			//not submitted	
		}
	}
	//reset
	function reset() {
		location.reload();
	}