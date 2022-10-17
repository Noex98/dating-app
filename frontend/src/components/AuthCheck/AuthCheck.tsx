import React, { ReactNode } from 'react'

type Props = {
    children: ReactNode
}

export const AuthCheck = ({children} : Props) => {
    return (
        <>
            {children}
        </>
    )
}
