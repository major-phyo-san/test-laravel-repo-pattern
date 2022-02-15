<?php

namespace App\Http\Repositories\Car;

use App\Models\Car;

class CarRepository implements CarRepositoryInterface{

    public function getAllCars()
    {
        return Car::all();
    }

    public function getCarById($carId)
    {
        return Car::whereId($carId);
    }

    public function createNewCar(array $carDetails)
    {
        return Car::create($carDetails);
    }

    public function updateCar($carId, array $newDetails)
    {
        return Car::whereId($carId)->update($newDetails);
    }

    public function deleteCar($carId)
    {
        return Car::destroy($carId);
    }

    public function queryCars(array $queryData)
    {
        
        return Car::where($queryData['maker'], $queryData['maker']);
    }

}
