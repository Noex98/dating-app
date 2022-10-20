export class apiModel {

    static url = "http://localhost:4000/api"

    static login = async (username: string, password: string) => {
        const url = this.url + '/login/index.php'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username,
                password: password
            })
        })
        return await res.json();
    }

    static continueSession = async () => {
        const url = this.url + '/continueSession/index.php'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            }
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
        const url = this.url + '/signup/index.php'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
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

    static editUser = async( 
        firstname: string,
        lastname: string,
        height: number,
        gender: "male" | "female",
        birthday: string
    ) => {
        const url = this.url + '/edit/index.php'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                firstname: firstname,
                lastname: lastname,
                height: height,
                gender: gender,
                birthday: birthday
            })
        })
        return await res.json();
    }

    static setPreferences = async(
        heightMin: number,
        heightMax: number,
        ageMin: number,
        ageMax: number,
        gender: "male" | "female"
    ) => {
        const url = this.url + '/preferences'
        const res = await fetch(url, {
            method: "POST",
            body: JSON.stringify({
                heigtMin: heightMin,
                heightMax: heightMax,
                ageMin: ageMin,
                ageMax: ageMax,
                gender: gender
            })
        })
        return await res.json();
    }
    static getMatches = () => {

    }

   

    static logout = () => {
        
    }
}