import type IAutoTrips from "@/utils/interfaces/IAutoTrips.ts";

export default class Home {
    public static changeNumberType(autoTrips: Array<IAutoTrips>): Array<object> {
        return autoTrips.map((autoTrip: IAutoTrips) => {
            return {
                ...autoTrip,
                consumption: (Math.round((autoTrip.consumption / 100) * 100) / 100).toFixed(2),
                bulk: (Math.round((autoTrip.bulk / 100) * 100) / 100).toFixed(2),
            }
        });
    }
};