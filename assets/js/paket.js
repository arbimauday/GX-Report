
var bali_arr = new Array("Supra Fit NF 100 L / N 2913 AJ","Supra Fit NF 100 L / N 2911 AJ","Vario NF 11b2d1 / N 4710 BX","Supra Fit x / N 2904 AJ","Supra Fit NF 100 SE / DK 7636 FE","Revo NF 11B1D / DK 2858 OT","Revo NF 11B1D / DK 6903 OB","Revo NF 11B1D / DK 2461 OT","Revo NF 11B1D / DK 8026 CL","Supra Fit NF 100 SE / DK 8898 FN","Supra Fit NF 100 SE / DK 7635 FE","Revo NF 11B1D / DK 6902 OB","Yamaha Vega / DK 2060 IC","Revo NF 11B1D / DK 5815 OQ","N 9608 AT / Grand Max","N 1574 BQ / Avanza 1300G","N 1840 CJ / Avanza","DK 9675 JF / T120SS PU 1,5 Pick up","N 9143 A / Blind Van S401 RV","DK 9904 FM / Blind Van S401 RV","	DK 9673 JF / T120SS PU 1,5 Pick up","N 9250 CF / T120SS PU 1,5 Pick up","DK 9771 FF / T120SS PU 1,5 Pick up","DK 9672 JF / Colt T120SS PU 1,5 Pick up","N 1572 BQ / Avanza 1300G");

// Kutas
var s_a = new Array();
s_a[0]="";
s_a[1]="M_001";
s_a[2]="M_002";
s_a[3]="M_003";
s_a[4]="M_004";
s_a[5]="M_005";
s_a[6]="M_006";
s_a[7]="M_007";
s_a[8]="M_008";
s_a[9]="M_009";
s_a[10]="M_010";
s_a[11]="M_011";
s_a[12]="M_012";
s_a[13]="M_013";
s_a[14]="M_014";
s_a[15]="M_015";
s_a[16]="M_016";
s_a[17]="M_017";
s_a[18]="M_018";
s_a[19]="M_019";
s_a[20]="M_020";
s_a[21]="M_021";
s_a[22]="M_022";
s_a[23]="M_023";
s_a[24]="M_024";
s_a[25]="M_025";
s_a[26]="M_026";



function populateKutas( baliElementId, kutaElementId ){
	
	var selectedBaliIndex = document.getElementById( baliElementId ).selectedIndex;

	var kutaElement = document.getElementById( kutaElementId );
	
	kutaElement.length=0;	// Fixed by Gerry
	//kutaElement.options[0] = new Option('Select package','');
	kutaElement.selectedIndex = 0;
	
	var kuta_arr = s_a[selectedBaliIndex].split("|");
	
	for (var i=0; i<kuta_arr.length; i++) {
		kutaElement.options[kutaElement.length] = new Option(kuta_arr[i],kuta_arr[i]);
	}
}

function populateBalis(baliElementId, kutaElementId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var baliElement = document.getElementById(baliElementId);
	baliElement.length=0;
	baliElement.options[0] = new Option('','-1');
	baliElement.selectedIndex = 0;
	for (var i=0; i<bali_arr.length; i++) {
		baliElement.options[baliElement.length] = new Option(bali_arr[i],bali_arr[i]);
	}

	// Assigned all countries. Now assign event listener for the kutas.

	if( kutaElementId ){
		baliElement.onchange = function(){
			populateKutas( baliElementId, kutaElementId );
		};
	}
}