<?php

namespace App\Repositories\AutoTrips;

use App\Attributes\NotEmpty;
use App\Dto\AutoTrips\AutoTripsDto;
use App\Dto\AutoTrips\AutoTripsStoreDto;
use App\Exception\AutoTripsDto\WrongTypePropException;
use App\Exception\Repositories\AutoTrips\NoAutoTripsFoundException;
use App\Interfaces\InterfaceRepositoriesAutoTrips;
use App\Models\AutoTripsModel;
use App\Validators\Repositories\AutoTripsValidator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AutoTripsRepositories implements InterfaceRepositoriesAutoTrips
{
    #[NotEmpty(message: "Auto trips collection is empty.")]
    private Collection $autoTrips;
    #[NotEmpty(message: "Auto trip not found.")]
    private ?AutoTripsModel $autoTrip;

    public function __construct(
        private readonly AutoTripsValidator $autoTripsValidator,
    )
    {
    }

    /**
     * @throws \ReflectionException
     * @throws WrongTypePropException
     * @throws NoAutoTripsFoundException
     */
    public function index(): \SplFixedArray
    {
        $this->autoTrips = AutoTripsModel::with("carBrand", "carModel", "autoTripData")
            ->take(5)
            ->get();

        $this->autoTripsValidator::validate($this, "autoTrips");

        $splFixedArray = new \SplFixedArray($this->autoTrips->count());

        for ($index = 0; $index < $splFixedArray->getSize(); $index++) {
            $trip = $this->autoTrips->shift(); // Извлекаем и удаляем первый элемент
            $splFixedArray[$index] = new AutoTripsDto(
                $trip->id,
                $trip->carBrand->car_brand_name,
                $trip->carModel->car_model_name,
                $trip->autoTripData->bulk,
                $trip->autoTripData->consumption,
                $trip->autoTripData->mileage,
                $trip->created_at->format('d.m.Y')
            );
        }

        return $splFixedArray;
    }

    public function store(AutoTripsStoreDto $autoTripsStoreDto): bool
    {
        return AutoTripsModel::insert([
            'car_brand_id' => $autoTripsStoreDto->__get("car_brand_id"),
            'car_model_id' => $autoTripsStoreDto->__get("car_model_id"),
            'auto_trip_data_id' => $autoTripsStoreDto->__get("auto_trip_data_id"),
            'auto_trip_id' => $autoTripsStoreDto->__get("auto_trip_id"),
            'created_at' => $autoTripsStoreDto->__get("created_at"),
            'updated_at' => now(),
        ]);
    }

    /**
     * @throws NoAutoTripsFoundException
     * @throws \ReflectionException
     * @throws WrongTypePropException
     */
    public function read(int $autoTripId): AutoTripsDto
    {
        $this->autoTrip = AutoTripsModel::with("carBrand", "carModel", "autoTripData")
            ->where("id", $autoTripId)
            ->first();

        $this->autoTripsValidator::validateAutoTripReadDestroy($this, "autoTrip", $autoTripId);

        return new AutoTripsDto(
            $this->autoTrip->id,
            $this->autoTrip->carBrand->car_brand_name,
            $this->autoTrip->carModel->car_model_name,
            $this->autoTrip->autoTripData->bulk,
            $this->autoTrip->autoTripData->consumption,
            $this->autoTrip->autoTripData->mileage,
            $this->autoTrip->created_at->format('d.m.Y')
        );
    }

    public function destroy(int $autoTripId): bool
    {
        return DB::transaction(function () use ($autoTripId) {
            $this->autoTrip = AutoTripsModel::where("id", $autoTripId)
                ->with("autoTripData", "autoTripsBrandModel")
                ->first();

            // Валидация на наличие всех трех
            $this->autoTripsValidator::validateAutoTripReadDestroy($this, "autoTrip", $autoTripId);

            // Удаляем связанные данные, если они существуют
            $this->autoTrip->autoTripData->delete();
            $this->autoTrip->autoTripsBrandModel->delete();

            // Удаляем основную запись
            return $this->autoTrip->delete();
        });
    }

    /**
     * Удаляет связанную запись, если она существует
     *
     * @param object $relatedModel
     * @param string $relationName
     * @return void
     * @throws \Exception
     */
    private function deleteRelatedData(object $relatedModel, string $relationName): void
    {
        if (!$relatedModel) {
            throw new \Exception("Related data '{$relationName}' not found for deletion.");
        }

        $relatedModel->delete();
    }
}
