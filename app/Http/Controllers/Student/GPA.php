<?php

namespace App\Http\Controllers\Student;

trait GPA
{

    public $normal_rule = [
        'score' => [90, 80, 70, 60, 0],
        'point' => [4.0, 3.0, 2.0, 1.0, 0]
    ];

    public $beida_rule = [
        'score' => [90, 85, 82, 78, 75, 72, 68, 64, 60, 0],
        'point' => [4.0, 3.7, 3.3, 3.0, 2.7, 2.3, 2.0, 1.5, 1.0, 0]
    ];


    public $normal1_rule = [
        'score' => [85, 70, 60, 0],
        'point' => [4.0, 3.0, 2.0, 0]
    ];

    public $normal2_rule = [
        'score' => [85, 75, 60, 0],
        'point' => [4.0, 3.0, 2.0, 0]
    ];

    /**
     * $flag 加权
     */
    public function countGPA($reports, $rules, $flag = false)
    {
        // $flag = false;
        // if($rules == $this->normal_rule || $rules == $this->normal1_rule || $rules == $this->normal2_rule) {
        //     $flag = true;
        // }
        $all_terms_scores = 0;
        $all_terms_points = 0;
        $all_terms_gpa = 0;
        $all_terms_gpas = [];
        $all_terms_credits = 0;
        foreach ($reports as $term => $value) {
            $term_scores = 0;
            $term_points = 0;
            $term_credits = 0;
            foreach ($value as $report) {
                $score = $report['课程成绩'];
                $credit = $report['所得学分'];
                $point = 0;
                for ($i = 0; $i < count($rules['point']); $i++) {
                    if ($score >= $rules['score'][$i]) {
                        $point = $rules['point'][$i];
                        break;
                    }
                }
                $term_scores += $flag ? $score * $credit : $credit * $point;
                $term_credits += $credit;
                $term_points += $point;
            }
            $all_terms_scores += $term_scores;
            $all_terms_points += $term_points;
            $all_terms_credits += $term_credits;
            $all_terms_gpas[$term] = $flag ? round($term_scores / $term_credits * 4 /100, 2)
            : round($term_scores / $term_credits, 2);
        }
        $all_terms_gpa = round($all_terms_scores / $all_terms_credits, 2);
        return json_encode([
            'gpa' => $all_terms_gpa,
            'gpas' => $all_terms_gpas,
        ]);
    }

    public function countGPAs($reports)
    {
        $gpas = [];
        foreach ($reports as $key => $value) {
            $total_scores = 0;
            $total_credits = 0;
            foreach ($value as $report) {
                $total_scores += $report['课程成绩'] * $report['所得学分'];
                $total_credits += $report['所得学分'];
            }
            $gpas[$key] = round($total_scores / $total_credits * 4 /100, 2);
        }
        return $gpas;
    }
}