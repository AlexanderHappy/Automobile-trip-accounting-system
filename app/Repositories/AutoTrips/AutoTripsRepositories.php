<?php

namespace App\Repositories\AutoTrips;

use App\Attributes\NotEmpty;
use App\Dto\AutoTrips\AutoTripsDto;
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
        DB::transaction(function () use ($autoTripId) {
            $autoTrip = AutoTripsModel::where("id", $autoTripId)
                ->with("autoTripData", "autoTripsBrandModel")
                ->first();

            $this->autoTripsValidator::validateAutoTripReadDestroy($this, "autoTrip", $autoTripId);

            if ($autoTrip) {
                // Удаляем связанную запись из auto_trip_data
                /*
                 * TODO Написать проверку на каждую запись полученную из таблицы.
                 * */
                if ($autoTrip->autoTripData) {
                    $autoTrip->autoTripData->delete();
                }

                // Удаляем связанную запись из auto_trips_brand_model
                if ($autoTrip->autoTripsBrandModel) {
                    $autoTrip->autoTripsBrandModel->delete();
                }

                // Удаляем саму запись из auto_trips
                $autoTrip->delete();
            }
        });

        dd();
    }
}
