export class apiModel {

    static url = "http://localhost:4000/api"

    static login = async (username: string, password: string) => {
        const url = this.url + '/login'
        const res = await fetch(url, {
            method: "POST",
            body: JSON.stringify({
                username: username,
                password: password
            })
        })
        return await res.json();
    }

    static signup = async (
        username: string,
        password: string,
        firstname: string,
        lastname: string,
        height: number,
        gender: "male" | "female",
        birthday: string
    ) => {
        const url = this.url + '/signup'
        const res = await fetch(url, {
            method: "POST",
            body: JSON.stringify({
                username: username,
                password: password,
                firstname: firstname,
                lastname: lastname,
                height: height,
                gender: gender,
                birthday: birthday
            })
        })
        return await res.json();
    }

    static getMatches = () => {

    }

    static logout = () => {
        
    }
}