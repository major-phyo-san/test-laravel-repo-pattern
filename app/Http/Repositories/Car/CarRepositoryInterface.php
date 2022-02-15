<?php

namespace App\Http\Repositories\Car;

use App\Models\Car;

interface CarRepositoryInterface{

    public function getAllCars();

    public function getCarById($carId);

    public function createNewCar(array $carDetails);

    public function updateCar($carId, array $newDetails);

    public function deleteCar($carId);

    public function queryCars(array $queryData);

}
