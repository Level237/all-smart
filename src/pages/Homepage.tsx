import React from 'react'
import Hero from '../components/Hero'
import Header from '../components/Header'
import ListBrand from '@/components/Brands/ListBrand'

export default function Homepage() {
  return (
    <>

    
        <Hero/>
    <section className='bg-[#232323] py-12'>
    <ListBrand/>
    </section>
    </>
  )
}
