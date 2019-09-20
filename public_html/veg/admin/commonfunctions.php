<?
$indent=0;
$catlist="";
$indent_text="- ";
$cat_str="";

function getcategoryView($parent_id)
{
	global $indent;
	global $catlist;
	global $indent_text;
	global $cat_str;

	$sql_headers="select * from ck_categories where catParentId='".$parent_id."'";
	$res_cat=mysql_query($sql_headers);
	if($res_cat && mysql_num_rows($res_cat))
	{
		while($row=mysql_fetch_array($res_cat))
		{
			$add_indent="";
			for($i=0; $i< $indent; $i++)
			$add_indent.=$indent_text;
			$catId=$row['catId'];
			$catTitle=$row['catTitle'];
			$catlist.='
			<tr>
				<td>'.$add_indent.$catTitle.'</td>
				<td align="center">'.activeInactiveLink('cat_link',$catId,$row['catStatus']).'</td>
				<td align="center">'.editLink("/admin/category/category_add.php?mode=edit&id=$row[catId]").'</td>
				<td align="center">'.deleteLink('cat_link',$catId).'</td>
			</tr>';
			$indent++;
			$parent_id=$catId;
			getcategoryView($parent_id);
		}
	}
	$indent--;
	if($indent<0)
	{
		$val=$catlist;
		$catlist="";
		$indent=0;
		return $val;
	}
}

function author_list($aid)
{
	 
	$sql="select author_id,author_name from article_author order by author_name asc";
	$qry=mysql_query($sql);
	$str="<select name='author_name' id='author_name'>";
	if(empty($aid))
	{
	$str.='<option value="">--select Author--</option>';
	}
	while($row=mysql_fetch_object($qry))
	{
		  $selected=($aid==$row->author_id)?"selected":" ";
		  $str.='<option value="'.$row->author_id.'" '.$selected.'>'.$row->author_name.'</option>';
	}
	echo  $str.='</select>';
}
return $str;

function article_image_list($imid)
{
	$sql="select image_id,article_image  from article_images order by article_image asc";
	$qry=mysql_query($sql);
	$str="<select name='article_pre_image' id='article_image'>";
	if(empty($imid))
	{
	$str.='<option value="">--select image--</option>';
	}
	while($row=mysql_fetch_object($qry))
	{
		  $selected=($imid==$row->image_id)?"selected":" ";
		$str.='<option value="'.$row->image_id.'" '.$selected.'>'.$row->article_image.'</option>';
	}
	echo  $str.='</select>';
}
return $str;
?>