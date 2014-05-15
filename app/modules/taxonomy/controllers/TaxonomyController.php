<?php 
namespace App\Modules\Taxonomy;

class TaxonomyController extends \BaseController
{
	public function createAction($_taxonomy)
	{
		
		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{
			$input 			= \Input::all();
			
			$slug 		= \Str::slug($input['slug'], '-');
			$name_slug 	= \Str::slug($input['name'], '-');

			$slug  			= (empty($slug)) ? $name_slug : $slug;
			$input['slug'] 	= $slug;

			$rules = array(
				'name' 	=> 'required',
			);

			$validator = \Validator::make($input, $rules);
			if( $validator->passes() )
			{
				$term = \Terms::where('slug', $input['slug']);
				if(!$term_id = $term->pluck('term_id'))
				{
					$term = new \Terms;
				
					$term_id = $term->saveTerm($input);
				}
				else
				{
					$term_id = $term->pluck('term_id');

					$exists = \Taxonomy::where('term_id', $term_id)->where('taxonomy', $_taxonomy)->count();
					if($exists)
					{
						return \Redirect::to('admin/taxonomy/'.$_taxonomy)
						->with('error_msg', 'A term with the name provided already exists with this parent.');
					}
				}

				if($term_id)
				{
					

					$taxonomy  = new \Taxonomy;

					$taxonomy->term_id 		= $term_id;
					$taxonomy->taxonomy		= $input['taxonomy'];
					$taxonomy->description	= $input['description'];
					$taxonomy->parent 		= $input['parent'];
					$taxonomy->count 		= 0;

					$taxonomy->save();

					return \Redirect::to('admin/taxonomy/'.$_taxonomy)
						->with('success_msg', 'Successfully saved!');
				}

				return \Redirect::to('admin/taxonomy/'.$_taxonomy)
						->with('error_msg', 'Unable to save category');
				
			}
			else
			{
				return \Redirect::to('admin/taxonomy/'.$_taxonomy)
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}


		$lists 		= new \CategoryTable($_taxonomy);
		$resultSet	= \DB::table('terms')->select('term_id', 'name')->get();
		$categories = array('0' => 'Select Parent');
		if($resultSet)
		{
			foreach($resultSet as $key => $row)
			{
				$categories[$row->term_id] = $row->name;
			}
		}


		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
		return \View::make('taxonomy::create')
			->with('categories', $categories)
			->with('taxonomy', $_taxonomy)
			->with('lists', $lists);
		}
	}





	public function editAction($_taxonomy, $id)
	{

		
		//$taxonomy =  $_taxonomy;

		if(!$terms = \Terms::find($id))
		{
			return \Redirect::to('admin/taxonomy/'.$_taxonomy)
				->with('error_msg', 'Category does not exists');
		}
		else
		{
			$taxonomy  = \Taxonomy::where('term_id' , '=', $id)->first();
		}

		$category = $terms->toArray();
		$category['description'] 	= $taxonomy->description;
		$category['parent'] 		= $taxonomy->parent;	
		$category['taxonomy'] 		= $taxonomy->taxonomy;



		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{

			$input = \Input::all();

			$slug 		= \Site::cleanSlug($input['slug']);
			$name_slug 	= \Site::cleanSlug($input['name']);

			$slug  = (empty($slug)) ? $name_slug : $slug;


			
			$input['slug'] = $slug;

			$rules = array(
				'name' 	=> 'required|unique:terms,name,'. $id.',term_id',
				'slug' 	=> 'unique:terms,slug,'. $id.',term_id',
			);

			$validator = \Validator::make($input, $rules);
			if( $validator->passes() )
			{
				
				//$terms = \Terms::find($id);
				$terms->name 		= $input['name']; 
				$terms->slug 		= $slug;
				$terms->term_group 	= 0;

				if($terms->save())
				{
					$term_id = $terms->term_id;

					
					$taxonomy->term_id 		= $term_id;
					$taxonomy->taxonomy		= $input['taxonomy'];
					$taxonomy->description	= $input['description'];
					$taxonomy->parent 		= $input['parent'];
					$taxonomy->count 		= 0;
					$taxonomy->save();

					return \Redirect::to('admin/taxonomy/category/'.$term_id.'/edit')
						->with('success_msg', 'Successfully saved!');
				}
				
				return \Redirect::to('admin/taxonomy/category/'.$term_id.'/edit')
						->with('error_msg', 'Unable to save category');
				
			}
			else
			{
			return \Redirect::to('admin/taxonomy/category/'.$id.'/edit')
				->with('category', $input)
				->with('errors', $validator->getMessageBag()->toArray());
			}
		}


		


		$lists 		= new \CategoryTable('category');
		$resultSet	= \DB::table('terms')->select('term_id', 'name')->where('term_id', '!=', $id)->get();
		$categories = array('0' => 'Select Parent');
		if($resultSet)
		{
			foreach($resultSet as $key => $row)
			{
				$categories[$row->term_id] = $row->name;
			}
		}


		return \View::make('taxonomy::edit')
			->with('categories', $categories)
			->with('lists', $lists)
			->with('taxonomy', $_taxonomy)
			->with('category', $category);

	}


	public function deleteAction()
	{
		$cid = \Input::get('cid');
		

		$queryResult = \DB::table('term_taxonomy')->whereIn( 'term_id', $cid )->delete();

		$queryResult = \DB::table('terms')->whereIn( 'term_id', $cid )->delete();


		echo json_encode(array('status' => $queryResult));
		exit;
	}


}