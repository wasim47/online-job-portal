<?php
Class Index_model extends CI_Model
{
	function __construct() {
		$this->tableName = 'users';
		$this->primaryKey = 'id';
	}
	
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			$userID = $prevResult['id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }
	
	function searchCv($keywords,$exp_from,$exp_to)
		{
			$this->db->select('*');
			$this->db->from('jobseekers');
			if($keywords!=""){
				$this->db->where("FIND_IN_SET('$keywords', skills)");
			}
			if($exp_from!="" && $exp_to!=""){
				$this->db->where("expected_salary BETWEEN '$exp_from' AND '$exp_to'");
			}
			elseif($exp_from!=""){
				$this->db->where("expected_salary LIKE '%$exp_from%'");
			}
			elseif($exp_to!=""){
				$this->db->where("expected_salary LIKE '%$exp_to%'");
			}
			$query = $this->db->get();
			return $query;
		}
		
	
	function getHotJobs()
		{
			$this->db->select('*');
			$this->db->from('jobpost j');
			$this->db->join('employers e','e.cid=j.emp_id');
			$this->db->where('j.hot_jobs',1);
			$this->db->group_by('e.cid');
			$query = $this->db->get();
			return $query;
		}
		
		
	function getAppliedJobs($empid)
		{
			/*$this->db->select('*');
			$this->db->from('applied_for_job');
			$this->db->join('jobpost', 'applied_for_job.employer_ID = jobpost.emp_id' ,'left');
			$this->db->where('applied_for_job.employer_ID', $empid);
			$query = $this->db->query("select * from applied_for_job left join jobpost on applied_for_job.employer_ID=jobpost.emp_id where applied_for_job.employer_ID='$empid'");*/
			$this->db->select('*');
			$this->db->from('applied_for_job a');
			$this->db->where('a.employer_ID',$empid);
			$query = $this->db->get();
			return $query;
		}
		
	function get_userLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
		 return $reader->row_array();
     }
	 
	 function get_employersLogin($usr, $pwd)
     {
		$this->db->where('com_email',$usr);
		//$this->db->or_where('user_name',$usr);
		$this->db->where('password',md5(sha1(md5($pwd))));
		$query = $this->db->get('employers');
		return $query;
     }
	
	
	function get_jobseekersLogin($usr, $pwd)
     {
		$this->db->where('email',$usr);
		//$this->db->or_where('username',$usr);
		$this->db->where('password',md5(sha1(md5($pwd))));
		$query = $this->db->get('jobseekers');
		return $query;
     }
	
	function get_voting_index() 
	{
		$pdate=date('j M Y');
		$query = $this
		->db
		->where('end_date <=', $pdate)
		->where('status ', '1')
		->order_by('voting_id', 'desc')
		->limit(1)
		->get('voting');
		$row = $query->row_array();		
		return $row;
	}
	
	function get_vot_insert($vot_arry)
	{
			$pdate=date('j M Y');
			$this->db->where('end_date', $pdate);
			$this->db->update('voting', $vot_arry);
			return false;
	}
	
	function get_votvalue() 
	{
	  $result=$this->db
	  		//->where('status', 1)
			//->order_by('cid', 'asc')
		    ->get('voting');
		    return $result->result();
	}
	
	
	
	function get_search_job_Count($keyword)
	{
		$this->db->like('job_title', $keyword);
		$this->db->or_like('experience', $keyword);
		$this->db->or_like('requirement', $keyword);
		$this->db->or_like('location', $keyword);
		$this->db->or_like('salary', $keyword);
		$this->db->or_like('education_qualification', $keyword);
		$this->db->or_like('allow_gender', $keyword);
		$this->db->order_by('job_id', 'desc');
		$query = $this->db->get('jobpost');
		return $query;
	}
	
	
	function get_search_job($keyword)
	{
		$this->db->like('job_title', $keyword);
		$this->db->or_like('experience', $keyword);
		$this->db->or_like('requirement', $keyword);
		$this->db->or_like('location', $keyword);
		$this->db->or_like('salary', $keyword);
		$this->db->or_like('education_qualification', $keyword);
		$this->db->or_like('allow_gender', $keyword);
		$this->db->order_by('job_id', 'desc');
		//$this->db->limit($start,$limit);
		$query = $this->db->get('jobpost');
		return $query;
	}
	
	
	
	function get_job_galleryCount($cat_id)
	{
		$this->db->where('job_category', $cat_id);
		$this->db->where('status', 1);
		$this->db->order_by('job_id', 'desc');
		$query = $this->db->get('jobpost');
		return $query;
	}
	
	
	function get_job_gallery($cat_id,$start,$limit)
	{
		$this->db->where('job_category', $cat_id);
		$this->db->where('status', 1);
		$this->db->order_by('job_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('jobpost');
		return $query;
	}
	
	
	 function get_job_galleryCountArchive($date)
	{
		$this->db->where('job_category', $cat_id);
		$this->db->where('status', 1);
		$this->db->order_by('job_id', 'desc');
		$query = $this->db->get('jobpost');
		return $query;
	}
	

	
	function get_news_galleryCount()
	{
		$this->db->order_by('news_id', 'desc');
		$query = $this->db->get('news');
		return $query;
	}
	
	 function get_news_galleryCountArchive($date)
	{
		$this->db->where('date_time', $date);
		$this->db->order_by('news_id', 'desc');
		$query = $this->db->get('news');
		return $query;
	}
	

	function get_news_gallery($start,$limit)
	{
		$this->db->where('status', 1);
		$this->db->order_by('news_id', 'desc');
		$this->db->limit($start,$limit);
		$query = $this->db->get('news');
		return $query;
	}
	
	
	
	
	function get_news_details($slug)
	{
		$query = $this
				->db
				->where('slug', $slug)
				->get('news');
			$row = $query->row_array();		
			return $row;
	}
	
	
	function get_related_news($id,$cat_id)
	{
		$result = $this
				->db
				->where('slug NOT IN ("$id")',NULL, FALSE)
				->where('category',$cat_id)
				->order_by('n_id', 'desc')
                                ->limit('10')
				->get('news_manage');
		return $result->result();
	}
	
	
	function get_newsId() 
	{
	  $result	= $this
	  ->db
	  ->order_by('news_id', 'desc')
	   ->limit(1)
	  ->get('news_manage');
	  $result	= $result->result();
	  return $result;
	}
	
	
	function most_readnews()
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		/*$datetwo=date('Y-m-d', strtotime("-3 days"));
		$dateone=date('Y-m-d');
		$this->db->where('count_date >=', $datetwo);
		$this->db->where('count_date <=', $dateone);*/
		$this->db->where('read_count !=', '0');
		$this->db->order_by('read_count', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query;
	}
	
	
	function getDataByIdWithPagination($table,$colId,$id,$orderId,$order,$start,$limit) 
	{
		if($colId!=""){
			$this->db->where($colId, $id);
		}
		$this->db->order_by($orderId, $order);
		$this->db->limit($start,$limit);
		$result=$this->db->get($table);
		return $result;
	}
	
	
	function searchdata($keyword,$start,$limit) 
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		$this->db->like('headline', $keyword);
		$this->db->or_like('full_description', $keyword);
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$result=$this->db->get();
		return $result;
	}
	
	function searchuserdata($enteId,$keyword,$start,$limit) 
	{
		$this->db->select('*');
		$this->db->from('news_manage');
		$this->db->where('journalist', $enteId);
		$this->db->like('headline', $keyword);
		$this->db->or_like('full_description', $keyword);
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($start,$limit);
		$result=$this->db->get();
		return $result;
	}
	
	
	 function menu_exist($key)
		{
			$this->db->where('menu_name',$key);
			$query = $this->db->get('menu');
			return $query;
		}
	  function category_exist($key)
		{
			$this->db->where('cat_name',$key);
			$query = $this->db->get('jobtype');
			return $query;
		}
		function subcategory_exist($key,$catid)
		{
			$this->db->where('sub_cat_name',$key);
			$this->db->where('cat_id',$catid);
			$query = $this->db->get('category');
			return $query;
		}
	
	function allCategoryNews($table,$catId,$notId,$limit)
	{
		$this->db->where('status', '1');
		//$this->db->where('top_news', '1');
		$this->db->where('category', $catId);
		//$this->db->where('image !=', ' ');
		if($notId!=""){
			//$this->db->where('top_news', '1');
			$this->db->where_not_in('n_id', $notId);
		}
		$this->db->order_by('n_id', 'desc');
		$this->db->limit($limit);
		$result=$this->db->get($table);
		return $result;
	}
	
	
	function commonAllData($table,$colId,$matchId,$orderId,$order,$limit)
	{
		// For Match with id
		if($colId!=""){
			$this->db->where($colId, $matchId);
		}
		$this->db->order_by($orderId, $order);
		// For Limit
		if($limit!=""){
			$this->db->limit($limit);
		}
		$result=$this->db->get($table);
		return $result;
	}
	 function update_squnce($table,$seqence,$colid,$id)
		{
	
			$query=$this->db->query("select * from ".$table." where squence='".$seqence."'");
			$results=$query->result();
			foreach($results as $row);
			$sequenceVal=$row->squence;
			$nid=$row->$colid;
								
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update ".$table." set squence='".$seqence."' where ".$colid."='".$id."'");
			}
			else{
				$query1=$this->db->query("select * from ".$table." where ".$colid."='".$id."'");
				$results1=$query1->result();
				foreach($results1 as $row1);
				$sequenceVal1=$row1->squence;
				$nid1=$row1->$colid;
			
				$update=$this->db->query("update ".$table." set squence='".$sequenceVal1."' where ".$colid."='".$nid."'");
				$update1=$this->db->query("update ".$table." set squence='".$seqence."' where ".$colid."='".$id."'");
			}
	}
	
	
			function get_approve($approve_val,$table,$id,$status)
			{
			   $setval = array(
				   $status => 1,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
			
			function get_deapprove($approve_val,$table,$id,$status)
			{
				 $setval = array(
				   $status => 0,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
	
		
// Menu 		
function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
		
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}
	
function getOneItemTableFromInstitute($table,$tableColum,$userColum,$instid,$instval,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->where($instid,$instval)
						->get($table);
		return $query->row_array();	
	}
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}

function getAllMember($keyword,$searchkey){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->order_by('company_name','asc');
	  $query = $this->db->get('member');
	 return $query;
}

/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	function updateTable($tablename, $tableprimary_idname,$tableprimary_idvalue, $updated_array){
		$modified_date = time();
		$this->db->where($tableprimary_idname,$tableprimary_idvalue);
		$dbquery = $this->db->update($tablename, $updated_array); 

		if($dbquery)
			return true;
		else
			return false;
	}
	 function checkOldPass($table,$dbuser,$sesionmail,$dbpass,$old_password,$dbid,$cid)
		{
			$this->db->where($dbuser, $sesionmail);
			$this->db->where($dbid, $cid);
			$this->db->where($dbpass, $old_password);
			$query = $this->db->get($table);
			return $query;
			/*if($query->num_rows() > 0)
				return 1;
			else
				return 0;*/
		}


/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
}

?>