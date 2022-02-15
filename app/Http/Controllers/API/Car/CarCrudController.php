<?php

namespace App\Http\Controllers\API\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\QueryCarRequest;
use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Http\Requests\Car\DeleteCarRequest;

use App\Http\Repositories\Car\CarRepositoryInterface;
use App\Models\Car;
use Illuminate\Http\Response;

use function GuzzleHttp\Promise\all;

class CarCrudController extends Controller
{

    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryCarRequest $request)
    {
        //
        // return response()->json($request->query());
        // $filteredCars = null;

        if($request->all() == []){
            $allCars = $this->carRepository->getAllCars();
            responseData('all cars', $allCars, 200);
        }        
        
        else{
            $queryData = $request->all();
            if(isset($queryData['maker'])){
                $filteredCars = $this->carRepository->queryCars(['key' => 'maker', 'value' => $queryData['maker']]);
                responseData('filtered cars', $filteredCars, 200);
            }
            if(isset($queryData['model'])){
                $filteredCars = $this->carRepository->queryCars(['key' => 'model', 'value' => $queryData['model']]);
                responseData('filtered cars', $filteredCars, 200);
            }
            if(isset($queryData['year'])){
                $filteredCars = $this->carRepository->queryCars(['key' => 'year', 'value' => $queryData['year']]);
                responseData('filtered cars', $filteredCars, 200);
            }
        }

    }

    public function detail(QueryCarRequest $request){
        $carDetail = $this->carRepository->getCarById($request->route('id'));

        responseData('car detail', $carDetail, 200);
    }

    // public function findCar(QueryCarRequest $request){
    //     $queryData = $request->all();

    //     $filteredCars = $this->carRepository->queryCars($queryData);
    //     responseData('filtered cars', $filteredCars, 200);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreCarRequest $storeCarRequest)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $storeCarRequest)
    {
        $newCar = $this->carRepository->createNewCar($storeCarRequest->all());
        responseData('new car', $newCar, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
        $carId = $request->route('id');
        $carDetails = $request->all();

        $updatedCar = $this->carRepository->updateCar($carId, $carDetails);
        responseData('updated car', $updatedCar, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCarRequest $request, Car $car)
    {
        //
        $carId = $request->route('id');

        $deletedCar = $this->carRepository->deleteCar($carId);
        responseData('deleted car', $deletedCar, 200);
    }
}
