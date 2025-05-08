export default interface IAutoTrips {
    id: {
        value: number;
        description: string;
    };
    car_brand_name: {
        value: string;
        description: string;
    };
    car_model_name: {
        value: string;
        description: string;
    };
    bulk: {
        value: number;
        description: string;
    };
    consumption: {
        value: number;
        description: string;
    };
    mileage: {
        value: number;
        description: string;
    };
    created_at: {
        value: string;
        description: string;
    };
}