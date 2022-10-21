export interface IUser {
    firstname: string,
    lastname: string,
    birthday: string,
    gender: "male" | "female",
    height: number
}

export interface ICurrentUser extends IUser {
    preferences: {
        ageMin: number,
        ageMax: number,
        heightMin: number,
        heightMax: number,
        gender: "male" | "female" | "all"
    };
}

export interface IRes<T> {
    succes: boolean,
    errMessage: string,
    data: T
}