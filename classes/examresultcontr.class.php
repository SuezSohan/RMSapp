<?php

class ExamResultContr extends ExamResult {

    //Student info getting function controller
    public function getStdInfoContr($usrId){
        return $this->getStdInfo($usrId);
    }

    //Getting exam date controller
    public function getExamDateContr($stdId, $exmMonth){
        return $this->getExamDate($stdId, $exmMonth);
    }

    //Getting date wise marks informations controller
    public function getMarksInfoContr($stdId, $exmDate){
        return $this->getMarksInfo($stdId, $exmDate);
    }

    //Getting highest mark controller
    public function getHighestMarkContr($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate){
        return $this->getHighestMark($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate);
    }

    //Grade count
    public function gradeCount($percentage){
        if($percentage < 32){
            return "F";
        }elseif($percentage < 40){
            return "D";
        }elseif($percentage < 50){
            return "C";
        }elseif($percentage < 60){
            return "B";
        }elseif($percentage < 70){
            return "A-";
        }elseif($percentage < 80){
            return "A";
        }elseif($percentage <= 100){
            return "A+";
        }
    }

    //Grade point count
    public function gradePointCount($percentage){
        if($percentage < 32){
            return "0";
        }elseif($percentage < 40){
            return "1";
        }elseif($percentage < 50){
            return "2";
        }elseif($percentage < 60){
            return "3";
        }elseif($percentage < 70){
            return "3.5";
        }elseif($percentage < 80){
            return "4";
        }elseif($percentage <= 100){
            return "5";
        }
    }

    //Grade point count from GPA
    public function totalGrade($gpa){
        if($gpa < 1){
            return "F";
        }elseif($gpa < 2){
            return "D";
        }elseif($gpa < 3){
            return "C";
        }elseif($gpa < 3.5){
            return "B";
        }elseif($gpa < 4){
            return "A-";
        }elseif($gpa < 5){
            return "A";
        }elseif($gpa == 5){
            return "A+";
        }
    }

    //mothly total of a student obtained markes
    public function monthlyObtainedContr($stdId, $exmMonth){
        return $this->getMonthlyObtained($stdId, $exmMonth);
    }

    //mothly total of a student total Marks
    public function getMonthlyTotalMarksContr($stdId, $exmMonth){
        return $this->getMonthlyTotalMarks($stdId, $exmMonth);
    }

    //Find Merit position
    public function stdMeritPosition($stdId, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth){
        $allStdId =$this->getDistinctStdId($exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth);

        $x = 0;
        foreach($allStdId as $allStdIdData){

            $x++;

            $allStdIdData["stdID"];
            $monthlyObtained = $this->getMonthlyObtained($allStdIdData["stdID"], $exmMonth);
            
            $monthlyObtainedArray[$x] = $monthlyObtained[0]["monthlyObtained"];
        }
        rsort($monthlyObtainedArray);
        
        $thisStdMonthlyObtained = $this->getMonthlyObtained($stdId, $exmMonth);

        $x = 0;
        foreach($monthlyObtainedArray as $arrayData){
            $x++;
            if ($thisStdMonthlyObtained[0]["monthlyObtained"] == $arrayData) {
                return $x;
                break;
            } 
        }
    }

    //Monthly GPA count
    public function monthlyGpa($stdId, $exmMonth){
        $exmDates = $this->getExamDate($stdId, $exmMonth);

        $x1 = 0; $sumMonthlyGpa = 0;
        foreach($exmDates as $exmDatesVal){
            $x1++;
            $marksInfo = $this->getMarksInfo($stdId, $exmDatesVal["exmDate"]);

            $x2 = 0 ; $sumGradePoint= 0; $multGradePoint = 1;
            foreach($marksInfo as $marksInfoVal){
                $x2++;
                $percentage = ($marksInfoVal["obtainedMarks"]/$marksInfoVal["totalMarks"])*100;
                $gradePoint = $this->gradePointCount($percentage);

                $sumGradePoint= $sumGradePoint + $gradePoint;
                $multGradePoint =$multGradePoint * $gradePoint;
            }
            if($multGradePoint == 0){ $gpa = 0;}else{$gpa = $sumGradePoint/$x2;}
            
            $sumMonthlyGpa = $sumMonthlyGpa + $gpa;
        }
        if($x1 !== 0){
            return $monthlyGpa =  $sumMonthlyGpa/$x1;
        }
    }



} 