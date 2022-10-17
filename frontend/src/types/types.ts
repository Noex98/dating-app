export interface IUser {
    firstname: string,
    lastname: string,
    age: number,
    gender: "male" | "female",

}

export interface ICurrentUser extends IUser {
    preferences: {
        minAge: number,
        maxAge: number,
        minHeight: number,
        maxHeight: number,
        gender: "male" | "female" | "all"
    }
}