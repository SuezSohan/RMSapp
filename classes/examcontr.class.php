<?php

class ExamContr extends Exam {

    //Input set exam data controller function
    public function setExamContr($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate){

        $exmDateExploded = explode("-", $exmDate);
        $exmMonth = $exmDateExploded[0]."-".$exmDateExploded[1];
        
        $this->setExam($exmSubject, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmMonth, $exmDate);
    }

    //Getting exam Controller
    public function getExamContr($exmMonth){
        return $this->getExam($exmMonth);
    }

     //Delete Exams controller
     public function deleteExmContr($exmId){
        $this->deleteExm($exmId);
    }

    //Getting exam date controller
    public function getExamDateContr($exmMonth, $exmClass, $exmGroup, $exmSection, $exmVersion){
        return $this->getExamDate($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion);
    }

    //Getting exam subject controller
    public function getExamSubjectContr($exmMonth, $exmClass, $exmGroup, $exmSection, $exmVersion, $exmDate){
        return $this->getExamSubject($exmMonth, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate);
    }

     //Getting Student informations for input marks controller
    public function getStdForInputMarksContr($exmClass, $exmGroup, $exmSection, $exmVersion){
        return $this->getStdForInputMarks($exmClass, $exmGroup, $exmSection,  $exmVersion);
    }

     //Insert student marks controller
     public function insertStdMarksContr($stdId, $exmSubject, $totalMarks, $obtainedMarks, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate, $exmMonth){
        $this->insertStdMarks($stdId, $exmSubject, $totalMarks, $obtainedMarks, $exmClass, $exmGroup, $exmSection,  $exmVersion, $exmDate, $exmMonth);
    }

    //Get student exam marks controller
    public function getStdMarksContr($stdId, $exmSubject, $exmDate, $exmMonth){
        $stdData = $this->getStdMarks($stdId, $exmSubject, $exmDate, $exmMonth);
        if(!empty($stdData)){
           return $stdData;
        }
    }
    
}