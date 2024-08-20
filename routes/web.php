<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Count;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog',[PostController::class,'index']);
// Route::get('/blog', function () {
//     return view('blog', [
//         'title' => 'Blog Page',
//         'posts' => [
//             [
//                 'id' => '1',
//                 'title' => 'Judul 1',
//                 'author' => 'Miftahudin Aldi Saputra',
//                 'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
//         Eveniet labore aliquam nihil doloribus minus impedit corporis, voluptas
//         aperiam consequuntur officiis, enim architecto error molestias! Tempora consequatur veniam eos rem
//         adipisci odio enim dolores? Assumenda inventore laboriosam sequi sed totam unde illo, at
//         similique esse perspiciatis nulla incidunt fugit repellat expedita.',

//             ],
//             [
//                 'id' => '2',
//                 'title' => 'Judul 2',
//                 'author' => 'Miftahudin Aldi Saputra',
//                 'body' => '    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
//             Facilis culpa soluta blanditiis, sapiente cupiditate illum. Distinctio natus animi, aliquid ipsa dolorum tenetur,
//             ut eligendi quos soluta, dolores accusamus velit. Vel amet aliquam rem assumenda?',
//             ]
//         ]
//     ]);
// });

// Route::get('/blog/{id}', function ($id) {


    // $posts = [
    //     [
    //         'id' => '1',
    //         'title' => 'Judul 1',
    //         'author' => 'Miftahudin Aldi Saputra',
    //         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //     Eveniet labore aliquam nihil doloribus minus impedit corporis, voluptas
    //     aperiam consequuntur officiis, enim architecto error molestias! Tempora consequatur veniam eos rem
    //     adipisci odio enim dolores? Assumenda inventore laboriosam sequi sed totam unde illo, at
    //     similique esse perspiciatis nulla incidunt fugit repellat expedita.',

    //     ],
    //     [
    //         'id' => '2',
    //         'title' => 'Judul 2',
    //         'author' => 'Miftahudin Aldi Saputra',
    //         'body' => '    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
    //         Facilis culpa soluta blanditiis, sapiente cupiditate illum. Distinctio natus animi, aliquid ipsa dolorum tenetur,
    //         ut eligendi quos soluta, dolores accusamus velit. Vel amet aliquam rem assumenda?',
    //     ]
    // ];

    // // mengambil data dengan id yang sesuai request parameter server
    // $post = Arr::first($posts, function ($post) use ($id) {
    //     return $post['id'] == $id;
//     });



//     return view('detail-blog', ['title' => 'single post', 'post' => $post]);
// });

Route::get('/detail-blog/{post:slug}', function (Post $post ) {
    return view('detail-blog', ['title' => 'Blog Page','post'=>$post]);
});

Route::get('/new-blog',[PostController::class,'create']);

Route::post('/insert-blog',[PostController::class,'store']);

Route::get('/edit-blog/{post:slug}',[PostController::class,'edit']);

Route::put('/update-blog/{post:slug}',[PostController::class,'update']);

Route::get('/delete-blog/{post:slug}',[PostController::class,'destroy'])->name('blog.delete');


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
Route::get('/author/{user:username}', function (User $user) {
    // dd($user->posts);

    return view('blog', ['title' => Count($user->posts).' Articles by '.$user->name, 'posts'=>$user->posts]);
});
Route::get('/category/{category:slug}', function (Category $category) {
    return view('blog', ['title' =>' Article in category: '.$category->name, 'posts'=>$category->posts]);
});

