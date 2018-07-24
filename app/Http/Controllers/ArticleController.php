<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $body = array(
                    "design" =>array(
                                    "title"=>"Design",
                                    "jobs"=>array(
                                                array(
                                                    "title" => "Graphic Designer",
                                                    "location" => "Tehri",
                                                    "permalink" => "graphic-designer",
                                                    "job_abstract" => "Your playground is the visual dimension. You will create strong visuals that tell the right story and leave a lasting impact.",
                                                    ),
                                                array(
                                                    "title" => "Product Designer",
                                                    "location" => "Gurugram",
                                                    "permalink" => "product-designer",
                                                    "job_abstract" =>"",
                                                    )
                                                )
                                    ),
                    "engineering"=>array(
                                    "title"=>"Engineering",
                                    "jobs"=>array(
                                                array(
                                                    "title" => "DevOps Engineer ",
                                                    "location" => "Tehri",
                                                    "permalink" => "devops-engineer",
                                                    "job_abstract" =>""
                                                    )
                                                )
                                    ),
                    "marketing"=>array(
                                    "title"=>"Marketing",
                                    "jobs"=>array(
                                                array(
                                                    "title" => "Marketing",
                                                    "location" => "Gurugram",
                                                    "permalink" => "marketing",
                                                    "job_abstract" =>""
                                                    ),
                                                ),
                                    ),
                    "project-management"=>array(
                                    "title"=>"Project Management",
                                    "jobs"=>array(
                                                array(
                                                    "title" => "Project Manager",
                                                    "location" => "Gurugram",
                                                    "permalink" => "project-manager",
                                                    "job_abstract" =>"Keeping the vision of the project intact and pulling the team towards it, managing expectations, during various stages of product development for great execution."
                                                    ),
                                                )
                                            )
                );    
    return json_encode($body);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;

        $article ->id = $request->input('id');
        $article ->name = $request->input('name');
        $article ->number = $request->input('number');
        $article ->email = $request->input('email');

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show a particular article
        $article = Article::findOrFail($id);

        //Return single article
        return new  ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Show a particular article
        $article = Article::findOrFail($id);

        //Return single article
        if ($article->delete()) {
            return new  ArticleResource($article);
        }
    }
}
