import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import CompaniesIndex from "../Pages/Companies/Index";
import CompaniesCreate from "../Pages/Companies/create";
import CompaniesEdit from "../Pages/Companies/Edit";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/dashboard" element={<CompaniesIndex />} />
                <Route path="/companies/create" element={<CompaniesCreate />} />
                <Route path="/companies/edit/:id" element={ <CompaniesEdit /> }></Route>

            </Routes>
        </BrowserRouter>
    );
}
