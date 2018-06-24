<?php
class TableClass {
	public function head(& $arrayName)
	{
		echo '<br>';
		echo '<table border = "1">';
		echo '<thead>';
		echo '<tr>'; 
		for ($i = 0; $i < count($arrayName); $i++)
		{ 
			echo '<th>'. $arrayName[$i] .'</th>';
		}
	}

	public function tableData(& $arrayData)
	{
		echo '<tr>';
		for ($i=0; $i < count($arrayData); $i++)
		{ 
			echo '<td>'. $arrayData[$i] .'</td>';
		}
		echo '</tr>';
	}

	public function closeHead()
	{
		echo '</tr>';
		echo '</thead>';
	}

	public function foot()
	{
		echo '</table>';
	}
}


?>
