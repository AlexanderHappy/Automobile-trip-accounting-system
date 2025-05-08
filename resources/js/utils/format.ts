export default function changeTypeNumber(number: number): number {
    return +(Math.round((number / 100) * 100) / 100).toFixed(2);
}
