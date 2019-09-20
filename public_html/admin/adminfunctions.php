<?
function uploadFile($uploaddir,$field_name,$image_name)
{
	#Upload file 
	
	$dir_name=$uploaddir;
	if (!file_exists($dir_name))
	{
		mkdir($dir_name,0777);
	}
	@chmod($dir_name,0777);
	
	$file_name= $image_name; 
	$tmp_file_name=$_FILES[$field_name]['tmp_name'];
	$target_path=$dir_name."/".basename($file_name);
	
	if(empty($file_name))
	{
		return false;
	}
	else
	{
		if(move_uploaded_file($tmp_file_name,$target_path))
		{
			return $image_name;
		}
		else
		{
			return false;
		}
	}
}

function activeInactiveLink($action='',$id='',$status=0)
{
	$str='<a href="/admin/process/process_active.php?action='.$action.'&id='.$id.'">';
	$str.=($status==1)? '<img src="/admin/images/icon_status_green.gif" border="0" alt="Active" title="Active"/>' : '<img src="/admin/images/icon_status_red.gif" border="0" title="Inactive" alt="Inactive"/>';
	$str.='</a>';
	return $str;
}

function editLink($url)
{
	return '<a href="'.$url.'"><img src="/admin/images/edit.png" border="0" alt="Edit" title="Edit"/></a>';
}

function deleteLink($action='',$id='')
{
	$str='<a href="/admin/process/process_delete.php?action='.$action.'&id='.$id.'" onClick="return Delete();"> <img src="/admin/images/no.png" border="0" title="Delete" alt="Delete"/></a>';
	return $str;
}

$indent=0;
$menulist="";
$indent_text="- ";
$menu_str="";

function getLeftMenuView($parent_id)
{
	global $indent;
	global $menulist;
	global $indent_text;
	global $menu_str;

	$sql_headers="select * from cms_menu where parent_id='".$parent_id."'";
	$res_menu=mysql_query($sql_headers);
	if($res_menu && mysql_num_rows($res_menu))
	{
		while($row=mysql_fetch_array($res_menu))
		{
			$add_indent="";
			for($i=0; $i< $indent; $i++)
			$add_indent.=$indent_text;
			$menu_id=$row['menu_id'];
			$menu_name=$row['menu_name'];
			$menulist.='
			<tr>
				<td>'.$add_indent.$menu_name.'</td>
				<td align="center">'.activeInactiveLink('left_menu',$menu_id,$row['active_status']).'</td>
				<td align="center">'.editLink("/admin/menu/left_menu_add.php?mode=edit&id=$row[menu_id]").'</td>
				<td align="center">'.deleteLink('left_menu',$menu_id).'</td>
			</tr>';
			$indent++;
			$parent_id=$menu_id;
			getLeftMenuView($parent_id);
		}
	}
	$indent--;
	if($indent<0)
	{
		$val=$menulist;
		$menulist="";
		$indent=0;
		return $val;
	}
}




?>