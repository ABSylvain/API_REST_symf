<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Users;
use AppBundle\Entity\Product;


class DefaultController extends Controller
{
////////////////////////////////////////////////////////////////////// ALL ROUTE FOR PRODUCT////////////////////////////////////


    /**
    * @Route("/", name="homepage")
    * @Method("GET")
    */
    public function indexAction(Request $request)
    {
       
    }
    /**
    * @Route("/products", name="allProduct")
    * @Method("GET")
    */
    public function getListAction(Request $request)
    {
        $products = $this->get('doctrine.orm.entity_manager')
                    ->getRepository('AppBundle:Product')
                    ->findAll();
        if (empty($products)) {
            return new JsonResponse(['message' => 'Products not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];
        foreach($products as $product){
            $formatted[]= [
                'ref' => $product->getReference(),
                'desc' => $product->getDescription(),
                'is_premium' => $product->getIsPremium(),
                'created_at' => $product->getCreatedAt(),
                'is_enabled' => $product->getIsEnabled(),
                'price' => $product->getPrice(),
                'note' => $product->getNote()
            ];
        }
        return new JsonResponse($formatted);
    }
    /**
    * @Route("/products/{id}", name="onlyProduct")
    * @Method("GET")
    */
    public function getByIdAction(Request $request, $id)
    {
        $product = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Product')
                ->find($id);
        if (empty($product)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];
        $formatted[]= [
            'ref' => $product->getReference(),
            'desc' => $product->getDescription(),
            'is_premium' => $product->getIsPremium(),
            'created_at' => $product->getCreatedAt(),
            'is_enabled' => $product->getIsEnabled(),
            'price' => $product->getPrice(),
            'note' => $product->getNote()
        ];
        return new JsonResponse($formatted);
    }
    /**
    * @Route("/products/{filter}", name="filterProduct")
    * @Method("GET")
    */
    public function getByFilterAction(Request $request, $desc)
    {
        $products = $this->get('doctrine.orm.entity_manager')
                    ->getRepository('AppBundle:Product')
                    ->find(array('description' => $desc));
        if (empty($products)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];
        foreach($products as $product){
            $formatted[]= [
                'ref' => $product->getReference(),
                'desc' => $product->getDescription(),
                'is_premium' => $product->getIsPremium(),
                'created_at' => $product->getCreatedAt(),
                'is_enabled' => $product->getIsEnabled(),
                'price' => $product->getPrice(),
                'note' => $product->getNote()
            ];
        }
        return new JsonResponse($formatted);
    }
    /**
    * @Route("/products", name="addProduct")
    * @Method("POST")
    */
    public function postNewAction(Request $request)
    {
       
    }
    /**
    * @Route("/products/{id}", name="deleteProduct")
    * @Method("DELETE")
    */
    public function deleteProductAction(Request $request)
    {
        
    }
    /**
    * @Route("/{id}", name="updateProduct")
    * @Method("UPDATE")
    */
    public function updateProductAction(Request $request)
    {
        
    }
//////////////////////////////////////////////////////////////////////// ALL ROUTE FOR USER//////////////////////////////////////////


    /**
    * @Route("/user/{login}", name="logUser")
    * @Method("POST")
    */
    public function loginAction(Request $request)
    {
        
    }
    /**
    * @Route("/user/{signIn}", name="addUser")
    * @Method("POST")
    */
    public function signInAction(Request $request)
    {
        
    }
    /**
    * @Route("/user/{id}", name="getUser")
    * @Method("GET")
    */
    public function getUserAction(Request $request, $id)
    {
        $user = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Users')
                ->find($id);
        if (empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];
        foreach($users as $user){
            $formatted[] = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'firstname' => $user->getFirstname(),
            'civility' => $user->getCivility(),
            'birthdate' => $user->getBirthdate(),
            'tel' => $user->getTel(),
            'country' => $user->getCountry(),
            'city' => $user->getCity(),
            'address' => $user->getAddress(),
            'postalcode' => $user->getPostalcode(),
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
            ];
        }
        return new JsonResponse($formatted);
    }
    /**
    * @Route("/user/{id}", name="updateUser")
    * @Method("UPDATE")
    */
    public function updateUserAction(Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
                    ->getRepository('AppBundle:Users')
                    ->find($id);
        if (empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted = [];
        $formatted[] = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'firstname' => $user->getFirstname(),
            'civility' => $user->getCivility(),
            'birthdate' => $user->getBirthdate(),
            'tel' => $user->getTel(),
            'country' => $user->getCountry(),
            'city' => $user->getCity(),
            'address' => $user->getAddress(),
            'postalcode' => $user->getPostalcode(),
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ];
        return new JsonResponse($formatted);
    }
    /**
    * @Route("/user/{id}", name="deleteUser")
    * @Method("DELETE")
    */
    public function deleteUserAction(Request $request)
    {
        
    }
}
