<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Table extends CI_Table {
  function _default_template(){
    return  array (
        'table_open' 			=> '<table class="table table-striped table-bordered">',
        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start' 	=> '<tr>',
        'heading_row_end' 		=> '</tr>',
        'heading_cell_start'	=> '<th>',
        'heading_cell_end'		=> '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start' 			=> '<tr>',
        'row_end' 				=> '</tr>',
        'cell_start'			=> '<td>',
        'cell_end'				=> '</td>',

        'row_alt_start' 		=> '<tr>',
        'row_alt_end' 			=> '</tr>',
        'cell_alt_start'		=> '<td>',
        'cell_alt_end'			=> '</td>',

        'table_close' 			=> '</table>'
          );	
  }

}
