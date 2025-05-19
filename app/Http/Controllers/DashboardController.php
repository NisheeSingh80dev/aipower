<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Project;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Query;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    protected $project;
    protected $gallery;
    protected $event;
    protected $blog;
    public function __construct(Project $project, Gallery $gallery, Event $event, Blog $blog)
    {


        $this->project = $project;
        $this->gallery = $gallery;
        $this->event = $event;
        $this->blog = $blog;
    }

    public function index(Request $request)
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
    public function career()
    {
        return view('career');
    }
    public function completeProject()
    {
        $project = $this->project->getAllCompletedProject();
        return view('completeProject', compact('project'));
    }
    public function gallery()
    {

        $gallery = $this->gallery->getAllGallery();
        return view('gallery', compact('gallery'));
    }
    public function video()
    {


        return view('video');
    }
    public function blog()
    {
        $blog = $this->blog->getAllBlog();

        return view('blog', compact('blog'));
    }
    public function blogDetails($id)
    {
        $blogDetails = $this->blog->getBlogDetailsById($id)->first();
        return view('blogDetails', compact('blogDetails'));
    }
    public function transmission()
    {


        return view('transmission');
    }
    public function vision()
    {


        return view('vision');
    }

    public function team()
    {

        return view('team');
    }
    public function construction()
    {


        return view('construction');
    }
    public function undergroundCable()
    {

        return view('undergroundCable');
    }
    public function runningProject()
    {
        $project = $this->project->getAllRunningProject();

        return view('runningProject', compact('project'));
    }
    public function press()
    {
        $event = $this->event->getAllEvent();
        return view('press', compact('event'));
    }
    public function contact()
    {
        return view('contact');
    }

    public function saveQuery(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'remark' => 'required|string|max:500',
            'subject' => 'required|string|max:255',
        ]);

        //   $query = Query::create($validated);

        //   return response()->json([
        //     'status' => 'success',
        //     'message' => 'Query submitted successfully',
        //      'data' => $query,
        //  ], 200);
        // }




    }









    /* 


    public function category(Request $request)
    {
        $id = $request->segment(2);
      
        $subcategory = $this->category->getSubCategoryByCategoryId($id);
   // print_r($subcategory);
   // die;
    
        $category = $this->category->getNavCategory();
    
        return view('category', compact('category','subcategory'));
    }
    
    
    public function ourClient()
    {   
        $category = $this->category->getAllCategory();

        return view('our-client',compact('category'));
       
    }
    public function product(Request $request)
    {   
        $id = $request->segment(2);
      
        $product = $this->product->getAllProductByCategoryId($id);
        $category = $this->category->getAllCategory();

      

        return view('product',compact('category','product'));
       
    }
    public function saveProduct(Request $request)
    {   
       // print_r($request->all());
        $id = $request->segment(2);
      //  print_r($id);
        $userData = [
            'name' => $request['name'],
           'com_name' => $request['com_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
            'remark' => $request['remark'],
            'product_id' => $request['id'],
         ];
       //  print_r($userData);
       //  die;
         $order = Order::create($userData);
         $category = $this->category->getAllCategory();
        
         $product = $this->product->getAllProductByCategoryId($id);
        return view('product',compact('category','product'));
       
    }
    public function saveContact(Request $request)
    {   
        $validatedData = $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'email'  => 'required|email|max:255',
            'remark' => 'nullable|string|max:1000',
        ]);
        $userData = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'remark' => $validatedData['remark'],
           
         ];
    
    
         $contact = Contact::create($userData);
         $category = $this->category->getAllCategory();
         return view('our-client',compact('category'));
       
    }




    public function calculater()
    {   
        
        return view('calculater');
       
    }

    public function saveCalculater(Request $request)
   
    {
        $names = $request->input('name');
        $qtys = $request->input('qty');
        $units = $request->input('unit');
        $prices = $request->input('price');
    
        $userData = [];
    
        foreach ($names as $key => $name) {
            $userData[] = [
                'name'  => $name,
                'qty'   => $qtys[$key],
                'unit'  => $units[$key],
                'price' => $prices[$key],
            ];
        }
    
        print_r($userData);
        // die;
    
        // Save all records at once
        Calculater::insert($userData);
    
        return view('product');
    }
    
    public function saveProducts(Request $request)
    {
        print_r($request);
        die;
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_des' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'category_id' => 'required|integer',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            print_r($imagePath);
            die;
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Image upload failed',
            ], 400);
        }
       
        $userData = [
            'name' => $validate['name'],
            'description' => $validate['description'],
            'short_des' => $validate['short_des'],
            'category_id' => $validate['category_id'],
            'image' => $imagePath, 
           
        ];
   // print_r($userData);
  //  die;
        $product = Product::create($userData);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product,
        ], 200);
    }

    public function saveQuery(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'remark' => 'required|string|max:500',
        ]);
    
        $userData = [
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'remark' => $validate['remark'],
        ];
        $contact = Contact::create($userData);
        return response()->json([
            'status' => 'success',
            'message' => 'Query submitted successfully',
            'data' => $contact,
        ], 200);
    }
    public function allProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

   
 */
}