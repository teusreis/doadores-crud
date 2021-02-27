export default class Doador {
    constructor() {
        this.baseUrl = "http://localhost/doadoresCRUD/public";
    }
    async emailExist(email, id = null) {
        let url = `${this.baseUrl}/emailexist/${email}/${id}`;
        const response = await fetch(url);
        const data = await response.json();
        return data;
    }
    async cpfExist(cpf, id = null) {
        let url = `${this.baseUrl}/cpfexist/${cpf}/${id}`;
        const response = await fetch(url);
        const data = await response.json();
        return data;
    }
    async delete(id) {
        let url = this.baseUrl + "/" + id;
        const response = await fetch(url, {
            method: "DELETE",
        });
        const data = await response.json();
        return data;
    }
    async get(id) {
        let url = this.baseUrl + "/" + id;
        const response = await fetch(url);
        const data = await response.json();
        return data;
    }
}