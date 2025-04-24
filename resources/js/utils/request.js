// eslint-disable-next-line @typescript-eslint/explicit-function-return-type,@typescript-eslint/typedef
export async function request (path, config) {
    return await fetch(path, config)
        // eslint-disable-next-line @typescript-eslint/typedef
        .then(response => {
            return response.json();
        })
}
