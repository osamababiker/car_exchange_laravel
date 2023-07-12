<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ChartController extends Controller 
{
  public $model = ''; 

  function getAllMonths(){

    $month_array = array();
    $charts_dates = $this->model::OrderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
    $charts_dates = json_decode( $charts_dates );

    if ( ! empty( $charts_dates ) ) {
      foreach ( $charts_dates as $unformatted_date ) {
        $date = new \DateTime( $unformatted_date );
        $month_no = $date->format( 'm' );
        $month_name = $date->format( 'M' );
        $month_array[ $month_no ] = $month_name;
      }
    }
    return $month_array;
  }

  function getMonthlyChartCount( $month ) {
    $monthly_chart_count = $this->model::whereMonth( 'created_at', $month )->get()->count();
    return $monthly_chart_count;
  }

  function getMonthlyChartData($model) {

    $monthly_chart_count_array = array();
    $this->model = 'App\\Models\\' . $model;
    $month_array = $this->getAllMonths();
    $month_name_array = array();
    if ( ! empty( $month_array ) ) {
      foreach ( $month_array as $month_no => $month_name ){
        $monthly_chart_count = $this->getMonthlyChartCount( $month_no );
        array_push( $monthly_chart_count_array, $monthly_chart_count );
        array_push( $month_name_array, $month_name );
      }
    }

    $max_no = max( $monthly_chart_count_array );
    $max = round(( $max_no + 10/2 ) / 10 ) * 10;
    $monthly_chart_data_array = array(
      'months' => $month_name_array,
      'chart_count_data' => $monthly_chart_count_array,
      'max' => $max,
    );


    return $monthly_chart_data_array;

    }

}
