<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('sale'); 
            if(!is_null($id)){ 
            $salesOwnerId = Sale::findOrFail($id)->owner->id;
                $saleId = (int)$salesOwnerId; 
                if($saleId !== Auth::id()){ 
                    abort(404);
                }
            }
            return $next($request);
        });
    } 

    public function index()
    {
        $sales = Sale::where('owner_id', Auth::id())
       
        ->paginate(20);

        return view('owner.sales.index', 
        compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            // sample01.php でアップロードされたCSVファイルは$_FILES['csv_file']取得できる
            $fileName = $_FILES['csv_file']['name'];
            $fileTmpName = $_FILES['csv_file']['tmp_name'];

            // ファイルパス
            $filePath = './csv/' . $fileName;

            // CSVファイルをcsvディレクトリに保存する
            move_uploaded_file($fileTmpName, $filePath);

            // csvディレクトリに保存したCSVファイルを読み込み、配列に置き換る。
            $data = array_map('str_getcsv', file($filePath));

            // 今回はDB:testにテーブル:membersを作成しておく
            try {
              $db = new PDO('mysql:dbname=test;host=localhost;charset-utf8', 'root', 'root');
            } catch (PDOException $e) {
              echo '接続エラー:' . $e->getMessage();
              exit;
            }

            // usersテーブルにデータを挿入する
            foreach ($data as $key => $row) {

              $stmt = $db->prepare("INSERT INTO sales (id, owner_id, date, today_sale, today_sale2, total_sales, total_sales2, rate, plan_rate, plan_rate2, last_rate) VALUES (:id, :owner_id, :date, :today_sale, :today_sale2, :total_sales, :total_sales2, :rate, :plan_rate, :plan_rate2, :last_rate)");
              $stmt->bindParam(':id', $id);
              $stmt->bindParam(':owner_id', $owner_id);
              $stmt->bindParam(':date', $date);
              $stmt->bindParam(':today_sale', $today_sale);
              $stmt->bindParam(':today_sale2', $today_sale2);
              $stmt->bindParam(':total_sales', $total_sales);
              $stmt->bindParam(':total_sales2', $total_sales2);
              $stmt->bindParam(':rate', $rate);
              $stmt->bindParam(':plan_rate', $plan_rate);
              $stmt->bindParam(':plan_rate2', $plan_rate2);
              $stmt->bindParam(':last_rate', $last_rate);
              $stmt->execute();
            }
            echo 'CSVアップロードが完了しました';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
