<?php

namespace PMRS\HL7\Node\Segment;

use PMRS\HL7\Node\Segment;

/*
 * The fields in the PID segment are as follows:
 * SEQ LEN DT OPT RP/# ELEMENT NAME
 * 1 4 SI O Set ID – Patient ID
 * 2 20 CX O Patient ID (External ID)
 * 3 20 CX R Y Patient ID (Internal ID)
 * 4 20 CX O Y Alternate Patient ID – PID
 * 5 48 XPN R Y Patient Name
 * 6 48 XPN O Mother’s Maiden Name
 * 7 26 TS O Date/Time of Birth
 * 8 1 IS O Sex
 * 9 48 XPN O Y Patient Alias
 * 10 1 IS O Race
 * 11 106 XAD O Y Patient Address
 * 12 4 IS B Country Code
 * 13 40 XTN O Y Phone Number – Home
 * 14 40 XTN O Y Phone Number – Business
 * 15 60 CE O Primary Language
 * 16 1 IS O Marital Status
 * 17 3 IS O Religion
 * 18 20 CX O Patient Account Number
 * 19 16 ST O SSN Number – Patient
 * 20 25 DLN O Driver’s License Number – Patient
 * 21 20 CX O Y Mother’s Identifier
 * 22 3 IS O Ethnic Group
 * 23 60 ST O Birth Place
 * 24 2 ID O Multiple Birth Indicator
 * 25 2 NM O Birth Order
 * 26 4 IS O Y Citizenship
 * 27 60 CE O Veterans Military Status
 * 28 80 CE O Nationality
 * 29 26 TS O Patient Death Date and Time
 * 30 1 ID O Patient Death Indicator
 */
class PIDSegment extends Segment {
	const IDENTIFIER = 'PID';
	public function getPID() {
		return ( string ) $this->children [1] [0];
	}
	public function getInternalPID() {
		return ( string ) $this->children [2] [0];
	}
	public function getPName() {
		return ( string ) $this->children [4] [0];
	}
}