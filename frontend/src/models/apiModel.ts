import { ICurrentUser, IRes, IUser } from "../types";

export class apiModel {

    static url = "/api"

    static login = async (
        username: string, 
        password: string
    ): Promise<IRes<ICurrentUser>> => {
        const url = this.url + '/login/'
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

    static continueSession = async (): Promise<IRes<ICurrentUser>> => {
        const url = this.url + '/continueSession/'
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
    ): Promise<IRes<null>> => {
        const url = this.url + '/signup/'
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
    ): Promise<IRes<null>> => {
        const url = this.url + '/edit/'
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
        gender: "male" | "female" | "all"
    ): Promise<IRes<null>> => {
        const url = this.url + '/preferences/'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                heightMin: heightMin,
                heightMax: heightMax,
                ageMin: ageMin,
                ageMax: ageMax,
                gender: gender
            })
        })
        return await res.json();
    }
    static getMatches = async(): Promise<IRes<IUser[]>> => {
        const url = this.url + '/getMatches/'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
        })
        return await res.json();
    }

    static logout = async (): Promise<IRes<null>> => {
        const url = this.url + '/logout/'
        const res = await fetch(url, {
            method: "POST",
            credentials: "include",
            headers: {
                'Content-Type': 'application/json'
            },
        })
        return await res.json();
    }
}