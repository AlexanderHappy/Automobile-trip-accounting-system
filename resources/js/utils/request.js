export async function request (path, config) {
    return await fetch(path, config)
        .then(response => {
            return response.json();
        })
}
