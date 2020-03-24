<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UploadController extends Controller
{
    public function actionExport()
    {
      $arr_data = ["emp_code","emp_name","care_taker","emp_address","mobile","email","aadhar_no","pan_no","dob","gender",
                  "branch","department","department_type","designation","date_of_joining","working_shift","weekly_dayoff",
                  "emp_type","bank_act_no","act_holder_name","bank_ifsc_no","bank_name"];
      $objPHPExcel = new Spreadsheet();
      $sheet = $objPHPExcel->getActiveSheet();
      $col = "A";
      foreach($arr_data as $d)
      {
        $sheet->setCellValue($col++.'1', $d);
      }
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename=Emp_upload_template.xlsx');
      header('Cache-Control: max-age=0');
      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, "Xlsx");
      $writer->save('php://output');
      die;
    }
}
